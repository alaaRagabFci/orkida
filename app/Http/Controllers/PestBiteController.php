<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePestBiteRequest;
use App\Models\PestBite;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Services\PestBiteService;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PestBiteController  extends Controller {

    public $pestBiteService;
    public function __construct(PestBiteService $pestBiteService)
    {
        $this->middleware('auth');
        $this->pestBiteService = $pestBiteService;
    }

    /**
     * List all settings.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function index(Request $request)
    {
        $bites  = $this->pestBiteService->listBites();
        $tableData = $this->pestBiteService->datatables($bites);
        if($request->ajax())
            return $tableData;

        return view('pest_bites.index')
            ->with('modal', 'pest_bites')
            ->with('modal_', '')
            ->with('edit_modal', 'adminpanel/pest_bites')
            ->with('tableData', $tableData);
    }

    /**
     * Update client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function create(): View
    {
        $bites = PestBite::get();
        return view('pest_bites.add')
            ->with('bites', $bites)
            ->with('edit_modal', '');
    }

    /**
     * Update client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function store(StorePestBiteRequest $request): RedirectResponse
    {
        $msg = '';
        $data  = $request->all();
        $data['image'] = $request->hasFile('image') ? $request->file('image') : "";
        $bite = $this->pestBiteService->storeBite($data);
        if($bite['status'] == true)
            $msg='تمت الأضافه بنجاح';
        return back()->with('msg',$msg);
    }

    /**
     * Edit setting.
     * requirements={
     *      {"name"="location_ar", "dataType"="string", "requirement"="\d+", "description"="location ar"}
     *  }
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function edit(int $id): View
    {
        $bites = PestBite::where('id', '!=', $id)->get();
        $bite = $this->pestBiteService->getBite($id);
        return view('pest_bites.edit')
            ->with('bite',$bite)
            ->with('bites', $bites)
            ->with('edit_modal', '');
    }

    /**
     * Update client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function update(StorePestBiteRequest $request, $id): RedirectResponse
    {
        $msg = '';
        $data  = $request->all();
        $data['id'] = $id;
        $image = $request->hasFile('image') ? $request->file('image') : "";
        $bite = $this->pestBiteService->updateBite($data, $image);
        if($bite['status'] == true)
            $msg='تم التخديث بنجاح';
        return back()->with('msg',$msg);
    }

    /**
     * Delete user.
     * requirements={
     *      {"name"="id", "dataType"="Integer", "requirement"="\d+", "description"="user id"}
     *  }
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function destroy(Request $request, $id)
    {
        $this->pestBiteService->deleteBite($id);

        if($request->ajax())
        {
            return new Response(json_encode(['msg'=>'Deleted Successfully', 203]));
        }
        return redirect()->back();
    }
}

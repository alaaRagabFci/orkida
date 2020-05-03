<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePestLibraryRequest;
use App\Models\Category;
use App\Models\PestLibrary;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Services\PestLibraryService;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PestLibraryController  extends Controller {

    public $pestLibraryService;
    public function __construct(PestLibraryService $pestLibraryService)
    {
        $this->middleware('auth');
        $this->pestLibraryService = $pestLibraryService;
    }

    /**
     * List all settings.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function index(Request $request)
    {
        $pests  = $this->pestLibraryService->listPestLibraries();
        $tableData = $this->pestLibraryService->datatables($pests);
        if($request->ajax())
            return $tableData;

        return view('pest_libraries.index')
            ->with('modal', 'pest_libraries')
            ->with('modal_', 'مكتبه أفات جديده')
            ->with('edit_modal', 'adminpanel/pest_libraries')
            ->with('tableData', $tableData);
    }

    /**
     * Update client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function create(): View
    {
        $pests = PestLibrary::get();
        return view('pest_libraries.add')
            ->with('pests', $pests)
            ->with('edit_modal', '');
    }

    /**
     * Update client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function store(StorePestLibraryRequest $request): RedirectResponse
    {
        $msg = '';
        $data  = $request->all();
        $data['image'] = $request->hasFile('image') ? $request->file('image') : "";
        $pest = $this->pestLibraryService->storePest($data);
        if($pest['status'] == true)
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
        $pests = PestLibrary::where('id', '!=', $id)->get();
        $pest = $this->pestLibraryService->getPest($id);
        return view('pest_libraries.edit')
            ->with('pest',$pest)
            ->with('pests', $pests)
            ->with('edit_modal', '');
    }

    /**
     * Update client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function update(StorePestLibraryRequest $request, $id): RedirectResponse
    {
        $msg = '';
        $data  = $request->all();
        $data['id'] = $id;
        $image = $request->hasFile('image') ? $request->file('image') : "";
        $pest = $this->pestLibraryService->updatePest($data, $image);
        if($pest['status'] == true)
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
        $this->pestLibraryService->deletePest($id);

        if($request->ajax())
        {
            return new Response(json_encode(['msg'=>'Deleted Successfully', 203]));
        }
        return redirect()->back();
    }

    public function sortPestLibrariesTypes(Request $request)
    {
        $data  = $request->all();
        return $this->pestLibraryService->sortPests($data);
    }
}

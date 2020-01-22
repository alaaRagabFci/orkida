<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\PestLibraryService;
use Illuminate\Http\Response;

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
    public function store(Request $request): Response
    {
        $data  = $request->all();
        $data['image'] = $request->hasFile('image') ? $request->file('image') : "";
        return $this->pestLibraryService->storePest($data);
    }

    /**
     * Edit setting.
     * requirements={
     *      {"name"="location_ar", "dataType"="string", "requirement"="\d+", "description"="location ar"}
     *  }
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function edit(int $id): Response
    {
        return $this->pestLibraryService->getPest($id);
    }

    /**
     * Update client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function update(Request $request): Response
    {
        $image = $request->hasFile('image') ? $request->file('image') : "";
        $data  = $request->all();
        return $this->pestLibraryService->updatePest($data, $image);
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

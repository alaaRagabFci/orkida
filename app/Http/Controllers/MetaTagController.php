<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MetaTagService;
use Illuminate\Http\Response;

class MetaTagController  extends Controller {

    public $metaTagService;
    public function __construct(MetaTagService $metaTagService)
    {
        $this->middleware('auth');
        $this->metaTagService = $metaTagService;
    }

    public function getServiceTags(Request $request, $serviceId)
    {
        $servicesTags  = $this->metaTagService->getServiceTags($serviceId);
        $tableData = $this->metaTagService->datatables($servicesTags);
        if($request->ajax())
            return $tableData;

        return view('meta_tags.index')
            ->with('serviceId', $serviceId)
            ->with('modal', 'meta_tags')
            ->with('modal_', 'Meta tag')
            ->with('edit_modal', 'adminpanel/meta_tags')
            ->with('tableData', $tableData);
    }

    /**
     * Update client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function store(Request $request): Response
    {
        $data  = $request->all();
        return $this->metaTagService->storeTag($data);
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
        $this->metaTagService->deleteTag($id);

        if($request->ajax())
        {
            return new Response(json_encode(['msg'=>'Deleted Successfully', 203]));
        }
        return redirect()->back();
    }
}

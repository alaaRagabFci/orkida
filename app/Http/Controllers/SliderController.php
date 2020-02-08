<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SliderService;
use Illuminate\Http\Response;

class SliderController  extends Controller {

    public $sliderService;
    public function __construct(SliderService $sliderService)
    {
        $this->middleware('auth');
        $this->sliderService = $sliderService;
    }

    /**
     * List all settings.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function index(Request $request)
    {
        $sٍliders  = $this->sliderService->listSliders();
        $tableData = $this->sliderService->datatables($sٍliders);

        if($request->ajax())
            return $tableData;

        return view('sliders.index')
            ->with('modal', 'sliders')
            ->with('modal_', 'سلايدر العروض')
            ->with('edit_modal', 'adminpanel/sliders')
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
        return $this->sliderService->storeSlider($data);
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
        return $this->sliderService->getSlider($id);
    }

    /**
     * Update client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function update(Request $request): Response
    {
        $image = $request->hasFile('image') ? $request->file('image') : "";
        $data  = $request->all();
        return $this->sliderService->updateSlider($data, $image);
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
        $this->sliderService->deleteSlider($id);

        if($request->ajax())
        {
            return new Response(json_encode(['msg'=>'Deleted Successfully', 203]));
        }
        return redirect()->back();
    }
}

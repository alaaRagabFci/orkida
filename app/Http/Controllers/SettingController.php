<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SettingService;
use Illuminate\Http\Response;

class SettingController  extends Controller {

    public $settingService;
    public function __construct(SettingService $settingService)
    {
        $this->middleware('auth');
        $this->settingService = $settingService;
    }

    /**
     * List all settings.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function index(Request $request)
    {
        $settings  = $this->settingService->listSettings();
        $tableData = $this->settingService->datatables($settings);

        if($request->ajax())
            return $tableData;

        return view('settings.index')
            ->with('modal', 'settings')
            ->with('edit_modal', 'adminpanel/settings')
            ->with('tableData', $tableData);
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
        return $this->settingService->getSetting($id);
    }

    /**
     * Update client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function update(Request $request): Response
    {
        $logo = $request->hasFile('logo') ? $request->file('logo') : "";
        $data  = $request->all();
        return $this->settingService->updateSetting($data, $logo);
    }
}

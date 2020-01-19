<?php

namespace App\Services;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables as Datatables;
use App\Models\Setting;

class SettingService
{
    private $utilityService;
    public function __construct(UtilityService $utilityService){
        $this->utilityService = $utilityService;
    }
    /**
     * List all Setting.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function listSettings()
    {
        return Setting::get();
    }

    /**
     * Datatebles
     * @param client
     * @return datatable.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function datatables($settings)
    {
        $tableData = Datatables::of($settings)
            ->editColumn('logo', '<a href="javascript:;"><img src="{{ config("app.baseUrl").$logo }}" class="image" width="50px" height="50px"></a>')
            ->addColumn('actions', function ($data)
            {
                return view('settings.actionBtns')->with('controller','adminpanel/settings')
                    ->with('id', $data->id)
                    ->render();
            })->rawColumns(['actions', 'logo'])->make(true);

        return $tableData ;
    }

    /**
     * Get client.
     * @param $settingId
     * @return Setting
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function getSetting(int $settingId): Response
    {
        $setting = Setting::findOrFail($settingId);
        if(!$setting instanceof Setting)
            return new Response(['message'=>'Phone not found'], 403);

        session(['logo'  => $setting->logo]);
        session(['setting_id'     => $setting->id]);
        return new Response(['status' => true, 'message'=>'Success','data'=> $setting->toJson()]);
    }

    /**
     * Update client.
     * @param $settingId
     * @param $title_ar
     * @param $title_en
     * @param $description_ar
     * @param $description_en
     * @param $icon
     * @param $page
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function updateSetting($parameters, $logo): Response
    {
        $oldLogo = session('logo');
        $settingId = session('setting_id');
        $setting = Setting::findOrFail($settingId);
        if(isset($logo) && $logo != ""){
            $data = $this->utilityService->uploadImage($logo);
            if(!$data['status'])
                return new Response(['message' => $data['errors'], 401]);

            $parameters['logo'] = $data['image'];
            }else{
                $parameters['logo']  = $oldLogo;
            }

        $setting->update($parameters);
        return new Response(['status' => true, 'message' => 'تم التحديث بنجاح']);
    }
}

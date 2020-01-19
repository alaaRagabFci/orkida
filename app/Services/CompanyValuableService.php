<?php

namespace App\Services;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables as Datatables;
use App\Models\CompanyValuable;

class CompanyValuableService
{
    private $utilityService;
    public function __construct(UtilityService $utilityService){
        $this->utilityService = $utilityService;
    }
    /**
     * List all Setting.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function listCompanyValuables()
    {
        return CompanyValuable::get();
    }

    /**
     * Datatebles
     * @param client
     * @return datatable.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function datatables($companyValuables)
    {
        $tableData = Datatables::of($companyValuables)
            ->editColumn('icon', '<a href="javascript:;"><img src="{{ config("app.baseUrl").$icon }}" class="image" width="50px" height="50px"></a>')
            ->addColumn('actions', function ($data)
            {
                return view('partials.actionBtns')->with('controller','adminpanel/company_valuables')
                    ->with('id', $data->id)
                    ->render();
            })->rawColumns(['actions', 'icon'])->make(true);

        return $tableData ;
    }

    /**
     * Create description.
     * @param $type
     * @param $username
     * @param $display_name
     * @param $phone
     * @param $image
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function storeCompanyValuable($parameters)
    {
        if(isset($parameters['icon']) && $parameters['icon'] != ""){
            $data = $this->utilityService->uploadImage($parameters['icon']);
            if(!$data['status'])
                return new Response(['message' => $data['errors'], 401]);
            $parameters['icon'] = $data['image'];
        }else{
            return new Response(['message' => 'image required', 401]);
        }
        $companyValuable = new CompanyValuable();
        $companyValuable->create($parameters);
        return new Response(['status' => true, 'message'=>'تم التسجيل بنجاح']);
    }

    /**
     * Get client.
     * @param $settingId
     * @return Setting
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function getCompanyValuable(int $companyId): Response
    {
        $companyValuable = CompanyValuable::findOrFail($companyId);
        if(!$companyValuable instanceof CompanyValuable)
            return new Response(['message'=>'company valuable not found'], 403);

        session(['icon'  => $companyValuable->icon]);
        session(['company_id'     => $companyValuable->id]);
        return new Response(['status' => true, 'message'=>'Success','data'=> $companyValuable->toJson()]);
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
    public function updateCompanyValuable($parameters, $icon): Response
    {
        $oldIcon = session('icon');
        $companyId = session('company_id');
        $company = CompanyValuable::findOrFail($companyId);
        if(isset($icon) && $icon != ""){
            $data = $this->utilityService->uploadImage($icon);
            if(!$data['status'])
                return new Response(['message' => $data['errors'], 401]);

            $parameters['icon'] = $data['image'];
            }else{
                $parameters['icon']  = $oldIcon;
            }

        $company->update($parameters);
        return new Response(['status' => true, 'message' => 'تم التحديث بنجاح']);
    }

    /**
     * Delete Slider.
     * @param $sliderId
     * @return Slider
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function deleteCompanyValuable($companyId)
    {
        return CompanyValuable::find($companyId)->delete();
    }
}

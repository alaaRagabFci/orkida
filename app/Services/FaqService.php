<?php

namespace App\Services;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables as Datatables;
use App\Models\SitePhone;

class SitePhoneService
{
    /**
     * List all Client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function listSitePhones()
    {
        return SitePhone::get();
    }

    /**
     * Datatebles
     * @param client
     * @return datatable.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function datatables($sitePhones)
    {
        $tableData = Datatables::of($sitePhones)
            ->addColumn('actions', function ($data)
            {
                return view('partials.actionBtns')->with('controller','adminpanel/site_phones')
                    ->with('id', $data->id)
                    ->render();
            })->rawColumns(['actions'])->make(true);

        return $tableData ;
    }

    public function createSitePhone(array $parameters): Response
    {
        if(SitePhone::where('phone', $parameters['phone'])->first())
            return new Response(['message'=>'رقم الهاتف موجود بالفعل'], 401);

        $phone = new SitePhone();
        $phone->create($parameters);
        return new Response(['status' => true,'message' => 'تم التسجيل بنجاح']);
    }

    /**
     * Get ReceivingTypes.
     * @param $receivingTypeId
     * @return ReceivingTypes
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function getSitePhone(int $phoneId): Response
    {
        $phone = SitePhone::findOrFail($phoneId);
        if(!$phone instanceof SitePhone)
            return new Response(['message'=>'SitePhone not found'], 403);

        return new Response(['status' => true, 'message'=>'Success','data'=> $phone->toJson()]);
    }

    /**
     * Update user.
     * @param $email
     * @param $receivingTypename
     * @return ReceivingTypes
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function updateSitePhone(array $parameters, int $phoneId): Response
    {
        if(SitePhone::where('phone', $parameters['phone'])->where('id', '!=', $phoneId)->first())
            return new Response(['message'=>'رقم الهاتف موجود بالفعل'], 401);

        $phone = SitePhone::findOrFail($phoneId);
        $phone->update($parameters);
        return new Response(['status' => true, 'message'=>'Updated Successfully']);
    }

    /**
     * Delete client.
     * @param $clientId
     * @return Client
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function deleteSitePhone($phoneId)
    {
        return SitePhone::find($phoneId)->delete();
    }
}

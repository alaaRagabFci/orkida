<?php

namespace App\Services;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables as Datatables;
use App\Models\Ad;

class AdService
{
    /**
     * List all Client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function listAds()
    {
        return Ad::get();
    }

    /**
     * Datatebles
     * @param client
     * @return datatable.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function datatables($ads)
    {
        $tableData = Datatables::of($ads)
            ->addColumn('actions', function ($data)
            {
                return view('ads.actionBtns')->with('controller','adminpanel/ads')
                    ->with('id', $data->id)
                    ->render();
            })->rawColumns(['actions'])->make(true);

        return $tableData ;
    }

    /**
     * Get ReceivingTypes.
     * @param $receivingTypeId
     * @return ReceivingTypes
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function getAd(int $adId): Response
    {
        $ad = Ad::findOrFail($adId);
        if(!$ad instanceof Ad)
            return new Response(['message'=>'Ad not found'], 403);

        return new Response(['status' => true, 'message'=>'Success','data'=> $ad->toJson()]);
    }

    /**
     * Update user.
     * @param $email
     * @param $receivingTypename
     * @return ReceivingTypes
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function updateAd(array $parameters, int $adId): Response
    {
        $ad = Ad::findOrFail($adId);
        $ad->update($parameters);
        return new Response(['status' => true, 'message'=>'Updated Successfully']);
    }
}

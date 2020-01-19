<?php

namespace App\Services;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables as Datatables;
use App\Models\AboutUs;

class AboutUsService
{
    /**
     * List all Client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function listAboutUs()
    {
        return AboutUs::get();
    }

    /**
     * Datatebles
     * @param client
     * @return datatable.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function datatables($about)
    {
        $tableData = Datatables::of($about)
            ->addColumn('actions', function ($data)
            {
                return view('about_us.actionBtns')->with('controller','adminpanel/about_us')
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
    public function getAboutUs(int $aboutId): Response
    {
        $about = AboutUs::findOrFail($aboutId);
        if(!$about instanceof AboutUs)
            return new Response(['message'=>'About not found'], 403);

        return new Response(['status' => true, 'message'=>'Success','data'=> $about->toJson()]);
    }

    /**
     * Update user.
     * @param $email
     * @param $receivingTypename
     * @return ReceivingTypes
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function updateAboutUs(array $parameters, int $aboutId): Response
    {
        $about = AboutUs::findOrFail($aboutId);
        $about->update($parameters);
        return new Response(['status' => true, 'message'=>'Updated Successfully']);
    }
}

<?php

namespace App\Services;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables as Datatables;
use App\Models\Faq;

class FaqqService
{
    /**
     * List all Client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function listFaqs()
    {
        return Faq::get();
    }

    /**
     * Datatebles
     * @param client
     * @return datatable.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function datatables($faqs)
    {
        $tableData = Datatables::of($faqs)
            ->addColumn('actions', function ($data)
            {
                return view('partials.actionBtns')->with('controller','adminpanel/faqs')
                    ->with('id', $data->id)
                    ->render();
            })->rawColumns(['actions'])->make(true);

        return $tableData ;
    }

    public function createFaq(array $parameters): Response
    {
        $faq = new Faq();
        $faq->create($parameters);
        return new Response(['status' => true,'message' => 'تم التسجيل بنجاح']);
    }

    /**
     * Get ReceivingTypes.
     * @param $receivingTypeId
     * @return ReceivingTypes
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function getfaq(int $faqId): Response
    {
        $faq = Faq::findOrFail($faqId);
        if(!$faq instanceof Faq)
            return new Response(['message'=>'Faq not found'], 403);

        return new Response(['status' => true, 'message'=>'Success','data'=> $faq->toJson()]);
    }

    /**
     * Update user.
     * @param $email
     * @param $receivingTypename
     * @return ReceivingTypes
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function updateFaq(array $parameters, int $faqId): Response
    {
        $faq = Faq::findOrFail($faqId);
        $faq->update($parameters);
        return new Response(['status' => true, 'message'=>'Updated Successfully']);
    }

    /**
     * Delete client.
     * @param $clientId
     * @return Client
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function deleteFaq($faqId)
    {
        return Faq::find($faqId)->delete();
    }
}

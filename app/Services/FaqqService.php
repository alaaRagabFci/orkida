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
            ->editColumn('description_ar', function (Faq $faq)
            {
                return htmlspecialchars_decode($faq->description_ar);
            })
            ->editColumn('description_en', function (Faq $faq)
            {
                return htmlspecialchars_decode($faq->description_en);
            })
            ->editColumn('is_common', function (Faq $faq)
            {
                if($faq->is_common == 1)
                    return '<span class="label label-sm label-primary"> نعم </span>';
                else
                    return '<span class="label label-sm label-warning">لا</span>';
            })
            ->addColumn('category', function (Faq $faq)
            {
                return $faq->getCategory->category_ar;
            })
            ->addColumn('actions', function ($data)
            {
                return view('faqs.actionBtns')->with('controller','adminpanel/faqs')
                    ->with('id', $data->id)
                    ->render();
            })->rawColumns(['actions', 'description_ar', 'description_en', 'category', 'is_common'])->make(true);

        return $tableData ;
    }

    public function createFaq(array $parameters): array
    {
        $faq = new Faq();
        $parameters['is_active'] = isset($parameters['is_active']) ?  1 : 0;
        $parameters['is_common'] = isset($parameters['is_common']) ?  1 : 0;
        $parameters['slug_ar'] = str_replace(' ', '-', $parameters['slug_ar']);
        $parameters['slug_en'] = str_replace(' ', '-', $parameters['slug_en']);
        $faq->create($parameters);
        return ['status' => true, 'message'=>'تم التسجيل بنجاح'];
    }

    /**
     * Get ReceivingTypes.
     * @param $receivingTypeId
     * @return ReceivingTypes
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function getfaq(int $faqId)
    {
        $faq = Faq::findOrFail($faqId);
        if(!$faq instanceof Faq)
            return new Response(['message'=>'Faq not found'], 403);
        return $faq;
    }

    /**
     * Update user.
     * @param $email
     * @param $receivingTypename
     * @return ReceivingTypes
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function updateFaq(array $parameters): array
    {
        $faq = Faq::findOrFail($parameters['id']);
        $parameters['is_active'] = isset($parameters['is_active']) ?  1 : 0;
        $parameters['is_common'] = isset($parameters['is_common']) ?  1 : 0;
        $parameters['slug_ar'] = str_replace(' ', '-', $parameters['slug_ar']);
        $parameters['slug_en'] = str_replace(' ', '-', $parameters['slug_en']);
        $faq->update($parameters);
        return ['status' => true, 'message'=>'تم التحديث بنجاح'];
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

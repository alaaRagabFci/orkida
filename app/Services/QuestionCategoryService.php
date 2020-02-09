<?php

namespace App\Services;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables as Datatables;
use App\Models\QuestionCategory;

class QuestionCategoryService
{
    /**
     * List all Client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function listQuestionCategories()
    {
        return QuestionCategory::get();
    }

    /**
     * Datatebles
     * @param client
     * @return datatable.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function datatables($questionCategories)
    {
        $tableData = Datatables::of($questionCategories)
            ->addColumn('actions', function ($data)
            {
                return view('partials.actionBtns')->with('controller','adminpanel/question_categories')
                    ->with('id', $data->id)
                    ->render();
            })->rawColumns(['actions'])->make(true);

        return $tableData ;
    }

    public function createQuestionCategory(array $parameters): Response
    {
        if(QuestionCategory::where('category_ar', $parameters['category_ar'])
                            ->orwhere('category_en', $parameters['category_en'])->first())
            return new Response(['message'=>'القسم موجود بالفعل'], 401);

        $questionCategory = new QuestionCategory();
        $questionCategory->create($parameters);
        return new Response(['status' => true,'message' => 'تم التسجيل بنجاح']);
    }

    /**
     * Get ReceivingTypes.
     * @param $receivingTypeId
     * @return ReceivingTypes
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function getQuestionCategory(int $categoryId): Response
    {
        $questionCategory = QuestionCategory::findOrFail($categoryId);
        if(!$questionCategory instanceof QuestionCategory)
            return new Response(['message'=>'QuestionCategory not found'], 403);

        return new Response(['status' => true, 'message'=>'Success','data'=> $questionCategory->toJson()]);
    }

    /**
     * Update user.
     * @param $email
     * @param $receivingTypename
     * @return ReceivingTypes
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function updateQuestionCategory(array $parameters, int $questionCategoryId): Response
    {
        if(QuestionCategory::where('id', '!=', $questionCategoryId)
            ->where('category_ar', $parameters['category_ar'])
            ->first())
            return new Response(['message'=>'القسم موجود بالفعل'], 401);

        $questionCategory = QuestionCategory::findOrFail($questionCategoryId);
        $questionCategory->update($parameters);
        return new Response(['status' => true, 'message'=>'Updated Successfully']);
    }

    /**
     * Delete client.
     * @param $clientId
     * @return Client
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function deleteQuestionCategory($questionCategoryId)
    {
        return QuestionCategory::find($questionCategoryId)->delete();
    }
}

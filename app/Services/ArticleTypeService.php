<?php

namespace App\Services;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables as Datatables;
use App\Models\ArticleType;

class ArticleTypeService
{
    /**
     * List all Client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function listArticleTypes()
    {
        return ArticleType::get();
    }

    /**
     * Datatebles
     * @param client
     * @return datatable.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function datatables($articleTypes)
    {
        $tableData = Datatables::of($articleTypes)
            ->addColumn('actions', function ($data)
            {
                return view('partials.actionBtns')->with('controller','adminpanel/article_types')
                    ->with('id', $data->id)
                    ->render();
            })->rawColumns(['actions'])->make(true);

        return $tableData ;
    }

    public function createArticleType(array $parameters): Response
    {
        if(ArticleType::where('category', $parameters['category'])->first())
            return new Response(['message'=>'القسم موجود بالفعل'], 401);

        $articleType = new ArticleType();
        $parameters['slug'] = str_replace(' ', '-', $parameters['slug']);
        $parameters['is_active'] = isset($parameters['is_active']) ?  1 : 0;
        $articleType->create($parameters);
        return new Response(['status' => true,'message' => 'تم التسجيل بنجاح']);
    }

    /**
     * Get ReceivingTypes.
     * @param $receivingTypeId
     * @return ReceivingTypes
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function getArticleType(int $categoryId): Response
    {
        $articleType = ArticleType::findOrFail($categoryId);
        if(!$articleType instanceof ArticleType)
            return new Response(['message'=>'ArticleType not found'], 403);

        return new Response(['status' => true, 'message'=>'Success','data'=> $articleType->toJson()]);
    }

    /**
     * Update user.
     * @param $email
     * @param $receivingTypename
     * @return ReceivingTypes
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function updateArticleType(array $parameters, int $articleTypeId): Response
    {
        if(ArticleType::where('category', $parameters['category'])->where('id', '!=', $articleTypeId)->first())
            return new Response(['message'=>'رقم الهاتف موجود بالفعل'], 401);

        $articleType = ArticleType::findOrFail($articleTypeId);
        $parameters['slug'] = str_replace(' ', '-', $parameters['slug']);
        $parameters['is_active'] = isset($parameters['is_active']) ?  1 : 0;
        $articleType->update($parameters);
        return new Response(['status' => true, 'message'=>'Updated Successfully']);
    }

    /**
     * Delete client.
     * @param $clientId
     * @return Client
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function deleteArticleType($articleTypeId)
    {
        return ArticleType::find($articleTypeId)->delete();
    }
}

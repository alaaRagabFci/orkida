<?php

namespace App\Services;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables as Datatables;
use App\Models\Category;

class CategoryService
{
    /**
     * List all Client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function listCategories()
    {
        return Category::get();
    }

    /**
     * Datatebles
     * @param client
     * @return datatable.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function datatables($categories)
    {
        $tableData = Datatables::of($categories)
            ->addColumn('actions', function ($data)
            {
                return view('categories.actionBtns')->with('controller','adminpanel/categories')
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
    public function getCategory(int $catgoryId): Response
    {
        $category = Category::findOrFail($catgoryId);
        if(!$category instanceof Category)
            return new Response(['message'=>'Phone not found'], 403);

        return new Response(['status' => true, 'message'=>'Success','data'=> $category->toJson()]);
    }

    /**
     * Update user.
     * @param $email
     * @param $receivingTypename
     * @return ReceivingTypes
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function updateCategory(array $parameters, int $catgoryId): Response
    {
        $category = Category::findOrFail($catgoryId);
        $category->update($parameters);
        return new Response(['status' => true, 'message'=>'Updated Successfully']);
    }
}

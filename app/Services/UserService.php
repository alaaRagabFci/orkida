<?php

namespace App\Services;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables as Datatables;
use Illuminate\Support\Facades\Auth;

class UserService
{
    /**
     * List all Client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function listUsers()
    {
        return User::where('id', '!=', Auth::user()->id)->get();
    }

    /**
     * Datatebles
     * @param client
     * @return datatable.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function datatables($users)
    {
        $tableData = Datatables::of($users)
            ->addColumn('actions', function ($data)
            {
                return view('partials.actionBtns')->with('controller','adminpanel/users')
                    ->with('id', $data->id)
                    ->render();
            })->rawColumns(['actions'])->make(true);

        return $tableData ;
    }

    /**
     * Create client.
     * @param $clientId
     * @param $title_ar
     * @param $title_en
     * @param $description_ar
     * @param $description_en
     * @param $icon
     * @param $page
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function createUser(array $parameters): Response
    {
        if(User::where('email', $parameters['email'])->first())
            return new Response(['message'=>'البريد الألكتروني موجود بالفعل'], 401);

        if(!$parameters['password'])
            return new Response(['message'=>'أدخل الرقم السري'], 401);

        $parameters['password'] = Hash::make($parameters['password']);
        $user = new User();
        $user->create($parameters);
        return new Response(['status' => true,'message' => 'تم التسجيل بنجاح']);
    }

    /**
     * Get ReceivingTypes.
     * @param $receivingTypeId
     * @return ReceivingTypes
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function getUser(int $userId): Response
    {
        $user = User::findOrFail($userId);
        if(!$user instanceof User)
            return new Response(['message'=>'User not found'], 403);
        $user->password = "";
        return new Response(['status' => true, 'message'=>'success','data'=> $user->toJson()]);
    }

    /**
     * Update user.
     * @param $email
     * @param $receivingTypename
     * @return ReceivingTypes
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function updateUser(array $parameters, int $userId): Response
    {
        if(User::where('email', $parameters['email'])->where('id', '!=', $userId)->first())
            return new Response(['message'=>'البريد الألكتروني موجود بالفعل'], 401);

        $user = User::findOrFail($userId);
        if(isset($parameters['password']) && $parameters['password'] != "")
            $parameters['password'] = Hash::make($parameters['password']);
        else
            unset($parameters['password']);
        $user->update($parameters);
        return new Response(['status' => true, 'message'=>'Updated Successfully']);
    }

    /**
     * Delete client.
     * @param $clientId
     * @return Client
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function deleteUser($userId)
    {
        return User::find($userId)->delete();
    }

    /**
     * Get admin info.
     * @param $userId
     * @return array
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function getAdmin(int $userId): array
    {
        $user = User::findOrFail($userId);
        if(!$user instanceof User)
            return array('code' => 403, 'message' => 'User not found');

        return ['status' => true, 'user' => $user];
    }

    /**
     * Update user.
     * @param $email
     * @param $name
     * @return array
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function updateProfile(int $userId, array $parameters): array
    {
        $user = User::findOrFail($userId);
        if(!$user instanceof User)
            return array('code' => 403, 'message' => 'User not found');

        if(User::where('email', $parameters['email'])->where('id', '!=', $userId)->first())
            return array('code' => 401, 'message' => 'Email already exist');

        $user->update($parameters);
        return array('status' => true, 'message' => 'User updated successfully');
    }
}

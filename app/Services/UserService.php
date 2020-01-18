<?php

namespace App\Services;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserService
{
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
    public function updateUser(int $userId, array $parameters): array
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

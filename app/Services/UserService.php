<?php


namespace App\Services;


use App\Models\User;

/**
 * Class UserService
 * @package App\Services
 */
class UserService
{
    /**
     * @param array $data
     * @return User
     */
    public function create(array $data): User
    {
        return (new User)->create($data);
    }
}

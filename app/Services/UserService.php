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

    /**
     * @param int $id
     * @return User|null
     */
    public function find(int $id): ?User
    {
        return User::whereId($id)->first();
    }
}

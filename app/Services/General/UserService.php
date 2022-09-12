<?php


namespace App\Services\General;


use App\Models\User;

class UserService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }

    public function model()
    {
        return User::class;
    }
}

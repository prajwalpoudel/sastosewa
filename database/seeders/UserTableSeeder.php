<?php

namespace Database\Seeders;

use App\Services\General\UserService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    private UserService $userService;

    /**
     * UserTableSeeder constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'      => 'admin',
                'email'     => 'admin@admin.com',
                'is_admin'  => true,
                'password'  => bcrypt('password')
            ],
            [
                'name'      => 'front',
                'email'     => 'front@front.com',
                'is_admin'  =>  false,
                'password'  => bcrypt('password')
            ]
        ];

        foreach($users as $user) {
            $this->userService->updateOrCreate(['email' => $user['email']], $user);
        }

    }
}

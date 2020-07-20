<?php

use Illuminate\Database\Seeder;
use Faker\Provider\lt_LT\PhoneNumber;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // App\User::Create([
        //     'name' => 'datnt2996',
        //     'email' => 'datnt2996@gmail.com',
        //     'password' => bcrypt(123456)
        // ]);

        // App\Manager::Create([
        //         'managerID' => 'MN01',
        //         'managerName' => 'Nguyễn Văn A',
        //         'address' => 'Tp.HCM',
        //         'email' => 'anv123@gmail.com',
        //         'phoneNumber' => '0909888999',
        //         'imageAvartar' => 'abc'
        // ]);
    //     App\Manager::Create([
    //         'managerID' => 'MN02',
    //         'managerName' => 'Nguyễn Thị Bình',
    //         'address' => 'Tp.HCM',
    //         'email' => 'binhtb@gmail.com',
    //         'phoneNumber' => '0909888999',
    //         'imageAvartar' => 'abc'
    // ]);

    // App\User::Create([
    //         'name' => 'datnt2996',
    //         'email' => 'datnt2996@gmail.com',
    //         'password' => bcrypt(123456)
    //     ]);
        App\UserManager::Create([
            'managerID' => 'MN01',
            'password' =>  bcrypt(123)
        ]);
    }
}

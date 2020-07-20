<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(ArticleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        //factory(App\article::class,10)->create();
        //actory(App\UserManager::class,50)->create();
    }
}

<?php

use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\article::Create([
            'Title' => 'Demo laravel',
            'Description' => 'Demo of Nguyen Thanh Dat',
            'ManagerID' => 'mn01',
            'ImageUrl' => '',
            'Content' => 'Test database article table',
            'TimeUpload'=> '',
        ]);
    }
}

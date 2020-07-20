<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    protected $file_table = ['id', 'Title', 'Description', 'ManagerID', 'ImageUrl', 'TimeUpLoad'];
}
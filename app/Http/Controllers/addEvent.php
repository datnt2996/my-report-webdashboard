<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class addEvent extends Controller
{
    public function __construct()
    {
    }

    public function getIndex(Request $request)
    {

    }
    public function store(Request $request)
    {
        dd('ok');
        // $ManagerID = Cache::get('auth_user');
        // $token = 'token.' . Cache::get($ManagerID);
    }
}
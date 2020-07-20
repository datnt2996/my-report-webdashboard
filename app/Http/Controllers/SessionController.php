<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function accessSessionData(Request $request) {
        if($request->session()->has('managerID'))
           return true;
        else
           return false;
     }
     public function storeSessionData(Request $request, String $value) {
        $request->session()->put('managerID',$value);
     }
     public function deleteSessionData(Request $request) {
        $request->session()->forget('managerID');
     }
}

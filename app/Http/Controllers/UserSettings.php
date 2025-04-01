<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserSettings extends Controller
{
    public function index(){

        // Fetch user settings from the database
        return view('usersettings.index');
    }


    public function edit(Request $request){
        // Fetch user settings from the database
        return view('usersettings.edit');
    }
    
}

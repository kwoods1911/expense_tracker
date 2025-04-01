<?php

namespace App\Http\Controllers;

use App\Models\User;
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


    public function update(Request $request, $userId){
        // Validate the request
        dd($userId);

        // find user by id
        $user = User::findOrFail($userId);

        // check if the authenticated user is the same as the user being updated
        if (auth()->id() !== $user->id) {
            return redirect()->back()->with('error', 'You are not authorized to update this user.');
        }

        $user->update([
            'receive_notifications' => $request->receive_notifications,
            'send_notification_time' => $request->send_notification_time,
        ]);

        return redirect()->route('usersettings')->with('success', 'Settings updated successfully!');
    }
    
}

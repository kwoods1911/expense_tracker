<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserSettings extends Controller
{
    public function index(){

        // Fetch user settings from the database
        //get the authenticated user
        $user = auth()->user();
        return view('usersettings.index', compact('user'));
    }


    public function edit($id){

        $user = User::findOrFail($id);
        // Fetch user settings from the database
        return view('usersettings.edit', compact('user'));
    }


    public function update(Request $request, $userId){
        // Validate the request
        // find user by 


        if($request->receive_notifications){
            $request->validate([
                'notification_time' => 'required',
            ]);

        }
        
        $user = User::findOrFail($userId);
        // check if the authenticated user is the same as the user being updated
        if (auth()->id() !== $user->id) return redirect()->back()->with('error', 'You are not authorized to update this users.');

        $user->update([
            'receive_notifications' => $request->receive_notifications  ? true : false,
            'send_notification_time' => \Carbon\Carbon::createFromFormat('H:i', $request->notification_time, 'America/Halifax')
            ->setTimezone(config('app.timezone'))
            ->format('H:i'),
        ]);

        return redirect()->route('usersettings')->with('success', 'Settings updated successfully!');
    }
    
}

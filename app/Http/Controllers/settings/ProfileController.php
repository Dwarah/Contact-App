<?php

namespace App\Http\Controllers\settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth');
    }
    
    public function edit()
    {
       return view('settings.profile', [
       'user' => auth()->user()
       ]);
    }

    public function update(ProfileUpdateRequest $request)
    {
       //dump($request->file('profile_picture'));
        //dd("update");
        
        $profileData = $request->handleRequest();
        
        $request->user()->update($profileData);

            return back()->with('message','Profile updated successfully');
    }

}


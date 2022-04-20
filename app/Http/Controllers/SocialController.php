<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserCode;
use Socialite, Auth;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider){
        //echo "<pre>";print_r($provider);die;
        $userSocial =   Socialite::driver($provider)->stateless()->user();
        //echo "<pre>";print_r($userSocial);die;
        $users       =   User::where(['email' => $userSocial->getEmail()])->first();
        if($users){
            Auth::login($users);

                
            auth()->user()->generateCode();
            return redirect()->route('2fa.index');
        }else{
        $user = User::create([
                'first_name'    => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'profile_pic'   => $userSocial->getAvatar(),
                'provider_id'   => $userSocial->getId(),
                'login_type'    => $provider,
            ]);

            Auth::login($user);
            return redirect()->route('home');
        }
    }   
}

<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleGoogleCallback()
    {
        try
        {
            $user = Socialite::driver('google')->user();
            $findUser = User::where('social_id', $user->id)->first();

            if($findUser)
            {
                Auth::login($findUser);
                return response()->json($findUser);
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'social_type' => 'google',
                    'password' => Hash::make('my-google')
                ]);

                Auth::login($newUser);
                return response()->json($newUser);
            }

        }catch(Exception $e){
            dd($e->getMessage());
        }
    }

    public function handleFacebookCallback()
    {
        try
        {
            $user = Socialite::driver('facebook')->user();
            $findUser = User::where('social_id', $user->id)->first();

            if($findUser)
            {
                Auth::login($findUser);
                return response()->json($findUser);
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'social_type' => 'facebook',
                    'password' => Hash::make('my-facebook')
                ]);

                Auth::login($newUser);
                return response()->json($newUser);
            }

        }catch(Exception $e){
            dd($e->getMessage());
        }
    }
}

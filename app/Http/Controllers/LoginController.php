<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Repositories\UserRepository;


class LoginController extends Controller
{

    public function loginSocial($social){
        if (Auth::check()){
            return redirect()->route('home');
        }

        return Socialite::with($social)->redirect();
    }

    public function responseSocial(UserRepository $userRepository, $social){
        if (!Auth::check()){
            $user = Socialite::with($social)->user();
            $useInSystem = $userRepository->getUserBySocialId($user, $social);
            Auth::login($useInSystem);

        }

        return redirect()->route('home');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Repositories\UserRepository;


class LoginController extends Controller
{
    public function loginVK(){
        if (Auth::check()){
            return redirect()->route('home');
        }

        return Socialite::with('vkontakte')->redirect();
    }

    public function responseVK(UserRepository $userRepository){
        if (!Auth::check()){
            $user = Socialite::with('vkontakte')->user();
            $useInSystem = $userRepository->getUserBySocialId($user, 'vk');
            Auth::login($useInSystem);

        }

        return redirect()->route('home');
    }

    public function loginGH(){
        if (Auth::check()){
            return redirect()->route('home');
        }

        return Socialite::with('github')->redirect();
    }

    public function responseGH(){
        $user = Socialite::driver('github')->user();
        dd($user);
    }

    public function loginInsta(){
        if (Auth::check()){
            return redirect()->route('home');
        }

        return Socialite::with('instagram')->redirect();
    }

    public function responseInsta(){
        $user = Socialite::driver('instagram')->user();
        dd($user);
    }

    public function loginYandex(){
        if (Auth::check()){
            return redirect()->route('home');
        }

        return Socialite::driver('yandex')->redirect();
    }

    public function responseYandex(){
        $user = Socialite::driver('yandex')->user();
        dd($user);
    }
}

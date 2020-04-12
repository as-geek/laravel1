<?php

namespace App\Http\Controllers\Auth;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function loginVK()
    {
        if(Auth::id()) {
            return redirect()->route('home');
        }
        return Socialite::with('vkontakte')->redirect();
    }

    public function responseVK(UserRepository $userRepository)
    {
        $user = Socialite::driver('vkontakte')->user();
        $systemUser = $userRepository->getUserBySocId($user, 'vk');
        Auth::login($systemUser);
        return redirect()->route('home');
    }
}



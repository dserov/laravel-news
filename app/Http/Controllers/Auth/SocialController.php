<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class SocialController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    //
    public function loginVK()
    {
        return Socialite::with('vkontakte')->redirect();
    }

    public function responseVK()
    {
        $user = Socialite::driver('vkontakte')->user();
        $ownUser = User::query()
            ->where('social_id', $user->getId())
            ->where('type_auth', 'vk')
            ->first();

        if (is_null($ownUser)) {
            $ownUser = User::query()
                ->where('email', $user->getEmail())
                ->first();
        }

        if (is_null($ownUser)) {
            $ownUser = new User();

            $ownUser->fill([
                    'social_id' => $user->getId(),
                    'type_auth' => 'vk',
                    'avatar' => $user->getAvatar(),
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => \Hash::make(Str::random()),
                    'remember_token' => Str::random(60)
                ]
            )->save();

            // Пусть юзер задаст пароль
//            return redirect()->route('password.reset', ['token' => $ownUser->remember_token]);
        }

        Auth::login($ownUser);

        if (Auth::user()->is_admin) {
            return redirect()->route('admin::news::index');
        }

        return redirect()->route('news::index');
    }

    //
    public function loginFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function responseFacebook()
    {
        $user = Socialite::driver('facebook')->user();
        $ownUser = User::query()
            ->where('social_id', $user->getId())
            ->where('type_auth', 'fb')
            ->first();

        if (is_null($ownUser)) {
            $ownUser = User::query()
                ->where('email', $user->getEmail())
                ->first();
        }

        if (is_null($ownUser)) {
            $ownUser = new User();

            $ownUser->fill([
                    'social_id' => $user->getId(),
                    'type_auth' => 'fb',
                    'avatar' => $user->getAvatar(),
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => \Hash::make(Str::random()),
                    'remember_token' => Str::random(60)
                ]
            )->save();

            // Пусть юзер задаст пароль
//            return redirect()->route('password.reset', ['token' => $ownUser->remember_token]);
        }

        Auth::login($ownUser);

        if (Auth::user()->is_admin) {
            return redirect()->route('admin::news::index');
        }

        return redirect()->route('news::index');
    }
}

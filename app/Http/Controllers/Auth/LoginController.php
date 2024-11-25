<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function facebookCallback(){
        $userProvider = Socialite::driver('facebook')->user();
        return $this->handleSocialLogin('facebook',$userProvider);
    }

    public function googleCallback(){
        $userProvider = Socialite::driver('google')->user();
        //dd($userProvider);
        return $this->handleSocialLogin('google',$userProvider);
    }

    public function githubCallback(){
        $userProvider = Socialite::driver('github')->user();
        return $this->handleSocialLogin('github',$userProvider);
    }

    public function handleSocialLogin($provider,$userProvider){
        $providerId = $userProvider->id;
        $user = User::where('provider', $provider)->where('provider_id', $providerId)->first();
        if (!$user){
            $user = new User();
            $user->name = $userProvider->name;
            $user->email = $userProvider->email;
            $user->password = Hash::make(Str::random(10));
            $user->provider = $provider;
            $user->provider_id = $providerId;
            $user->save();
        }
        $userId = $user->id;
        Auth::loginUsingId($userId);
        return redirect($this->redirectTo);
    }
}

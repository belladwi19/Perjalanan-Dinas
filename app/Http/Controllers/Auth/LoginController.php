<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request): RedirectResponse
    {   
        $input = $request->all();
     
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
     
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->is_Admin == '0') {
                $request->session()->regenerate();
                return redirect()->route('admin.home');
            }else if (auth()->user()->is_Admin == '1') {
                $request->session()->regenerate();
                return redirect()->route('pegawai.home');
            }else{
                $request->session()->regenerate();
                return redirect()->route('SDM.home');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
          
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
  
  
    public function handleGoogleCallback(Request $request)
    {
        try {
            $user_google    = Socialite::driver('google')->user();
            $user           = User::where('email', $user_google->getEmail())->first();

            if($user != null){
                Auth::login($user);
                $request->session()->put('user', $user);
                return redirect()->route('admin.home');
            }else{
                User::Create([
                    'email'             => $user_google->getEmail(),
                    'name'              => $user_google->getName(),
                    'password'          => 0,
                    
                ]);


                $user = Auth::user();
                $request->session()->put('user', $user);
                return redirect(route('admin.home'));
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->scopes(['email'])->redirect();
    }

    public function handleFacebookCallback(Request $request)
    {
        try {
            $user_facebook = Socialite::driver('facebook')->user();
            $user = User::where('email', $user_facebook->getEmail())->first();

            if ($user != null) {
                Auth::login($user);
                $request->session()->put('user', $user);
                return redirect()->route('admin.home');
            } else {
                User::create([
                    'email'             => $user_facebook->getEmail(),
                    'name'              => $user_facebook->getName(),
                    'password'          => 0,
                    'email_verified_at' => now(),
                ]);

                $user = Auth::user();
                $request->session()->put('user', $user);
                return redirect()->route('admin.home');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }


}

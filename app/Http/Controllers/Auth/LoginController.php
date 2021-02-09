<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Illuminate\Http\Request;

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

    protected $providers = [
        'github', 'gitlab', 'facebook'
    ];

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

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        if(in_array($provider, $this->providers)){
            return Socialite::driver($provider)->redirect();
        }
        return redirect()->route('login');
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        if(!in_array($provider, $this->providers)){
            return redirect()->route('login');
        }
        
        $socialiteUser = Socialite::driver($provider)->stateless()->user();
        
        $user = User::where('email', $socialiteUser->getEmail())->where('provider', $provider)->first();

        if($user) {
            \Auth::login($user);
            $user->update(['last_logged_in' => Carbon::now()]);
            return redirect()->route('dashboard');
        } else {
            $user = User::create([
                'name' => $socialiteUser->getName(),
                'email' => $socialiteUser->getEmail(),
                'image' => $socialiteUser->getAvatar(),
                'provider_id' => $socialiteUser->getId(),
                'password' => bcrypt(\Str::random(32)),
                'provider' => $provider,
                'last_logged_in' => Carbon::now(),
            ]);

            $user->email_verified_at = Carbon::now();
            $user->save();

            \Auth::login($user);
            
            return redirect()->route('dashboard');
        }
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return ['email' => $request->{$this->username()}, 'password' => $request->password, 'provider' => null];
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        $user->update(['last_logged_in' => Carbon::now()]);
    }
}

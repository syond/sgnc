<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;

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
    protected $redirectTo = '/dashboard';

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
     * Determine if the user has too many failed login attempts.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */

    protected function hasTooManyLoginAttempts ($request)
    {
        $maxLoginAttempts = 2;
        $lockoutTime = 5; // 5 minutes
        
        return $this->limiter()->tooManyAttempts(
            $this->throttleKey($request), $maxLoginAttempts, $lockoutTime
        );
    }


    protected function guard()
    {
        return Auth::guard();
    }


    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */

    public function username()
    {
        return 'matricula';
    }

    protected function validateLogin(Request $request)
    {
        $dados = $request->only('matricula', 'password');
        
        try {

            Auth::attempt($dados);

        } catch (Exception $e) {

            return $e->getMessage();

        }  
            
    }

    public function logout()
    {
        return redirect('login')->with(Auth::logout());
    }
}

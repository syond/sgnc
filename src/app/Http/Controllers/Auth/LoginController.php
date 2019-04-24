<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
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


    protected function validateLogin(Request $request)
    {
        //$this->validate($request, [
       //     'matricula' => '',
       //     'senha' => '',
        //]);

        //dd($request);

        $dados = [

            'matricula' => $request->get('matricula'),
            'senha'     => $request->get('senha'),

        ];
    //dd($dados);
        try {

            Auth::attempt($dados, false);

        } catch (Exception $e) {

            return $e->getMessage();

        }

            
    }

}

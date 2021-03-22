<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use http\Env\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    //se connecter avec email or mobile
    public function username()
    {    /*
       $identify=request()->input('identify');           // se input peut etre raef.bouzid98@gmail.com or 58817147
       $field=filter_var($identify,FILTER_VALIDATE_EMAIL) ? 'email':'mobile';        //filtrer var identify
        request()->merge([$identify=>$field]);                            //merge: ajouter un nouveau input in request()
        return $field;
         */

        return 'email';




    }

}

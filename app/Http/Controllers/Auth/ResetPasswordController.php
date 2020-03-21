<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //check Authenticated User and Redirect to Dashboard with his role and selected dashboard
        // (note::different dashboard for different roles)
        if (Auth::check() && Auth::user()->role->id==1){
            $this->redirectTo = route('admin.dashboard');
        }else {
            $this->redirectTo = route('author.dashboard');
        }
        $this->middleware('guest');
    }
}

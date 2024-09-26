<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Categories;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB;
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

    public function loginRegister()
    {
        $categories =  DB::connection('insurance_mysql')->table('profession')->get();
        return view('frontend.auth.login-register',compact('categories'));
    }


    public function redirectTo()
    {
        if (Auth::check()) {
            if (Auth::user()->hasRole('Super Admin')) {
                return '/';
            } else {
                return '/home';
            }
        } else {
            return '/home';
        }
    }

    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "errors" => $validator->errors()
            ]);
        } else {
            if (Auth::attempt($request->only(["email", "password"]))) {
                $user = Auth::user();
                if ($user->verified) {
                    return response()->json([
                        "status" => true, 
                        "message" => 'Login successful!',
                        "redirect" => url("/")
                    ]);
                } else {
                    Auth::logout();
                    return response()->json([
                        "status" => false,
                        "errors" => ["Please verify your email first."]
                    ]);
                }
            } else {
                return response()->json([
                    "status" => false,
                    "errors" => ["Invalid credentials"]
                ]);
            }
        }
    }
    
    
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\MyEmail;
use App\Models\UserWithCategories;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use DB;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'phone' => ['required'],
            'profession' => ['required'],
            'business_name' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */
    public function register_post(Request $request)
    {


        // Validation rules
        $rules = [
            'email' => [
                'required', // Ensure the email is required
                'email', // Ensure the email is a valid email format
                function ($attribute, $value, $fail) {
                    // Check if the email already exists in the database
                    $exists = DB::connection('insurance_mysql')->table('users')
                        ->where('email', $value)
                        ->exists();

                    if ($exists) {
                        $fail('The provided email already exists.');
                    }
                },
            ],
            'phone' => 'required|string|max:15', // Ensure phone number is required

//            'username' => [
//                'required', // Ensure the username is required
//                function ($attribute, $value, $fail) {
//                    // Check if the username already exists in the database
//                    $exists = DB::connection('insurance_mysql')->table('users')
//                        ->where('username', $value)
//                        ->exists();
//
//                    if ($exists) {
//                        $fail('The provided username already exists.');
//                    }
//                },
//            ],
            'password' => [
                'required',
                'min:6',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%@]).*$/',
                'confirmed'
            ],
            'category_id' => 'required', // Ensure category_id is required and exists in the categories table
            'business_name' => 'required',
        ];

        $messages = [
            'password.regex' => '  Password should be  English uppercase characters (A – Z)
                                    English lowercase characters (a – z)
                                    Base 10 digits (0 – 9)
                                    Non-alphanumeric (For example: !, $, #,@, or %)
                                    Unicode characters',
            'email.unique' => 'The email has already been taken.',
            'email.required' => 'Email is required.',
            'phone.required' => 'Phone is required.',
            'category_id.required' => 'Category is required.',
            'password.required' => 'Password is required.',
//            'username.required' => 'Username is required.',
            'business_name.required' => 'Business Name is required.',
        ];

        DB::connection('insurance_mysql')->table('users')->where('email', $request['email'])->exists();
        DB::connection('insurance_mysql')->table('users')->where('username', $request['email'])->exists();
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Validation failed.',
            ], 422);
        }
//        $user = User::create([
//            'name' => $request['name'],
//            'email' => $request['email'],
//            'password' => Hash::make($request['password']),
//            'phone' => $request['phone'],
//            'user_role' => $request['user_role'],
//        ]);
        $verificationCode = Str::random(20);
        $user = DB::connection('insurance_mysql')->table('users')->insert([
            'name' => Str::before($request['email'], '@'),
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'phone' => $request['phone'],
            'roleId' => 2,
            'verification_code' => $verificationCode,
            'username' => Str::before($request['email'], '@'),
            'business_name' => $request['business_name'],
            'category_id'=>$request['category_id'],
            'profession_id'=>$request['category_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $userDetail = DB::connection('insurance_mysql')->table('users')->where('email', $request['email'])->first();
        if ($userDetail) {
            $userDetail = (array)$userDetail; // Convert object to array
        }
//        $userCategory = UserWithCategories::create([
//            'user_id' => $user->id,
//            'category_id' => $request->category_id,
//        ]);

//        $user->assignRole('User');

//
//        $user->verification_code = $verificationCode;
//        $user->save();
//
        $maildata = [
            'verificationCode' => $verificationCode,
            'contact_email' => env('CONTACT_EMAIL')
        ];

        Mail::send('mail.verification', compact('userDetail', 'maildata'), function ($message) use ($userDetail) {
            $message->to($userDetail['email'])
                ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                ->subject('Please Confirm Your Email Address');
        });

        return response()->json([
            "status" => true,
            "message" => 'User registered successfully. Verification link sent to your email.',
            "redirect" => url("/")
        ]);
    }

    public function verifyUser($code)
    {

        $user = DB::connection('insurance_mysql')->table('users')->where('verification_code', $code)->first();

        if ($user) {
            if ($user->verified == 1) {
                return view('frontend.already_verified');
            } else {
                DB::connection('insurance_mysql')->table('users')->update(['verified' => 1]);

                /** SEND THE WELCOME EMAIL TO THE USER **/
                Mail::send('mail.welcome', ['user' => (array)$user], function ($message) use ($user) {
                    $message->to($user->email)
                        ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                        ->subject('Welcome to Our Platform');
                });

                return redirect()->route('login')->with('verified', true);
            }
        } else {
            return "Invalid verification code.";
        }
    }


}

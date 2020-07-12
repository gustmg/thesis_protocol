<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\ThesisProtocol;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = new User;
        $user->name=$data['name'];
        $user->email=$data['email'];
        $user->password=Hash::make($data['password']);
        $user->registration_number=$data['registrationNumber'];
        $user->career=$data['career'];
        $user->phone=$data['phone'];
        $user->job_phone=$data['jobPhone'];
        $user->user_type=$data['userType'];
        $user->save();

        if($user->user_type == 1){
            $thesis_protocol=new ThesisProtocol;
            $thesis_protocol->thesis_protocol_student_id=$user->id;
            $thesis_protocol->save();
        }

        return $user;

        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        //     'registration_number' => $data['registrationNumber'],
        //     'career' => $data['career'],
        //     'phone' => $data['phone'],
        //     'job_phone' => $data['jobPhone'],
        //     'user_type' => $data['userType'],
        // ]);
    }
}

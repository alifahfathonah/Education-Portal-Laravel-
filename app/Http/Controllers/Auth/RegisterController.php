<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function register(Request $request){

        //Check want to donate blood is checked or not
        if ($request->blood_check === null){
            //Check profession value is null or not
            if ($request->profession !=null){
                //If profession type is Student
                if ($request->profession === 'Student'){
                    if ($request->education_subject && $request->education_subject != null){
                        if ($request->education_type && $request->education_type == !null){
                            $this->validate($request,[
                                'first_name' => ['required', 'string', 'max:30'],
                                'last_name' => ['required', 'string', 'max:30'],
                                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                                'mobile' => ['required', 'string', 'max:15'],
                                'education_type' => ['required'],
                                'institute_name' => ['required','string', 'max:100'],
                                'password' => ['required', 'string', 'min:8', 'confirmed'],
                            ]);
                            $user = new User();
                            $user->first_name = $request->first_name;
                            $user->last_name = $request->last_name;
                            $user->email  = $request->email ;
                            $user->mobile = $request->mobile;
                            $user->profession = $request->profession;
                            $user->education_type = $request->education_subject;
                            $user->education = $request->education_type;
                            $user->institute_name = $request->institute_name;
                            $user->blood_donation_status = 0;
                            $user->password = Hash::make($request->password);
                            $user->save();
                            event(new Registered($user));
                            $this->guard()->login($user);
                            return $this->registered($request, $user)
                                ?: redirect($this->redirectPath());
                        }else{
                            $this->validate($request,[
                                'first_name' => ['required', 'string', 'max:30'],
                                'last_name' => ['required', 'string', 'max:30'],
                                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                                'mobile' => ['required', 'string', 'max:15'],
                                'education_type' => ['required'],
                                'institute_name' => ['required','string', 'max:100'],
                                'password' => ['required', 'string', 'min:8', 'confirmed'],
                            ]);
                        }
                    }else{
                        $this->validate($request,[
                            'first_name' => ['required', 'string', 'max:30'],
                            'last_name' => ['required', 'string', 'max:30'],
                            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                            'mobile' => ['required', 'string', 'max:15'],
                            'education_subject' => ['required'],
                            'institute_name' => ['required','string', 'max:100'],
                            'password' => ['required', 'string', 'min:8', 'confirmed'],
                        ]);
                    }
                }else{
                    //Write Auth query
                    $this->validate($request,[
                        'first_name' => ['required', 'string', 'max:30'],
                        'last_name' => ['required', 'string', 'max:30'],
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                        'mobile' => ['required', 'string', 'max:15'],
                        'profession' => ['required'],
                        'institute_name' => ['required','string', 'max:100'],
                        'password' => ['required', 'string', 'min:8', 'confirmed'],
                    ]);
                    $user = new User();
                    $user->first_name = $request->first_name;
                    $user->last_name = $request->last_name;
                    $user->email  = $request->email ;
                    $user->mobile = $request->mobile;
                    $user->profession = $request->profession;
                    $user->institute_name = $request->institute_name;
                    $user->blood_donation_status = 0;
                    $user->password = Hash::make($request->password);
                    $user->save();
                    event(new Registered($user));
                    $this->guard()->login($user);
                    return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
                }
            }else{
                $this->validate($request,[
                    'first_name' => ['required', 'string', 'max:30'],
                    'last_name' => ['required', 'string', 'max:30'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'mobile' => ['required', 'string', 'max:15'],
                    'profession' => ['required'],
                    'institute_name' => ['required','string', 'max:100'],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                ]);
            }

        }else{
            //If blood donation checkbox is checked
            if ($request->profession !=null){
                //If profession type is Student
                if ($request->profession === 'Student'){
                    if ($request->education_subject && $request->education_subject != null){
                        if ($request->education_type && $request->education_type == !null){
                            $this->validate($request,[
                                'first_name' => ['required', 'string', 'max:30'],
                                'last_name' => ['required', 'string', 'max:30'],
                                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                                'mobile' => ['required', 'string', 'max:15'],
                                'education_type' => ['required'],
                                'institute_name' => ['required','string', 'max:100'],
                                'password' => ['required', 'string', 'min:8', 'confirmed'],
                            ]);
                            $user = new User();
                            $user->first_name = $request->first_name;
                            $user->last_name = $request->last_name;
                            $user->email  = $request->email ;
                            $user->mobile = $request->mobile;
                            $user->profession = $request->profession;
                            $user->education_type = $request->education_subject;
                            $user->education = $request->education_type;
                            $user->institute_name = $request->institute_name;
                            $user->blood_donation_status = 1;
                            $user->password = Hash::make($request->password);
                            $user->street_address = $request->street_address;
                            $user->upozila = $request->upozila;
                            $user->blood_group = $request->blood_group;
                            $user->country = $request->country;
                            $user->district = $request->district;
                            $user->save();
                            event(new Registered($user));
                            $this->guard()->login($user);
                            return $this->registered($request, $user)
                                ?: redirect($this->redirectPath());
                        }else{
                            $this->validate($request,[
                                'first_name' => ['required', 'string', 'max:30'],
                                'last_name' => ['required', 'string', 'max:30'],
                                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                                'mobile' => ['required', 'string', 'max:15'],
                                'education_type' => ['required'],
                                'institute_name' => ['required','string', 'max:100'],
                                'password' => ['required', 'string', 'min:8', 'confirmed'],
                            ]);
                        }
                    }else{
                        $this->validate($request,[
                            'first_name' => ['required', 'string', 'max:30'],
                            'last_name' => ['required', 'string', 'max:30'],
                            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                            'mobile' => ['required', 'string', 'max:15'],
                            'education_subject' => ['required'],
                            'institute_name' => ['required','string', 'max:100'],
                            'password' => ['required', 'string', 'min:8', 'confirmed'],
                        ]);
                    }
                }else{
                    //Write Auth query

                    $this->validate($request,[
                        'first_name' => ['required', 'string', 'max:30'],
                        'last_name' => ['required', 'string', 'max:30'],
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                        'mobile' => ['required', 'string', 'max:15'],
                        'profession' => ['required'],
                        'institute_name' => ['required','string', 'max:100'],
                        'password' => ['required', 'string', 'min:8', 'confirmed'],
                    ]);

                    $user = new User();
                    $user->first_name = $request->first_name;
                    $user->last_name = $request->last_name;
                    $user->email  = $request->email ;
                    $user->mobile = $request->mobile;
                    $user->profession = $request->profession;
                    $user->institute_name = $request->institute_name;
                    $user->blood_donation_status = 1;
                    $user->password = Hash::make($request->password);
                    $user->street_address = $request->street_address;
                    $user->upozila = $request->upozila;
                    $user->blood_group = $request->blood_group;
                    $user->country = $request->country;
                    $user->district = $request->district;
                    $user->save();
                    event(new Registered($user));
                    $this->guard()->login($user);
                    return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
                }
            }else{
                $this->validate($request,[
                    'first_name' => ['required', 'string', 'max:30'],
                    'last_name' => ['required', 'string', 'max:30'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'mobile' => ['required', 'string', 'max:15'],
                    'profession' => ['required'],
                    'institute_name' => ['required','string', 'max:100'],
                    'street_address' => ['required'],
                    'upozila' => ['required'],
                    'blood_group' => ['required'],
                    'country' => ['required'],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                ]);
            }

        }
    }
}

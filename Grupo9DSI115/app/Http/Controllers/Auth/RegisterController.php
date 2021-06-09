<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Rol;
use Illuminate\Http\Request;
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

    public function index(){
        $this->middleware('guest');
        $allRol = Rol::all();
        return view('auth.register',compact('allRol'));
    }

    protected function register(Request $request)
    {
        //dd($request->rol); 
         $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rols_fk' => $request->rol,
        ]);


        // Creación del usuario
/*         $user = new User;
        $user->username = $username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->birthday = Date::make($request->birthday);
        $user->email = $request->email;
        $user->cell_phone = $request->cell_phone;
        $user->passcode = Hash::make($request->passcode);
        $user->password = Hash::make($temp_password);
        $user->temp_password = $temp_password;
        //$user->password = Hash::make('prueba123admin'); // cambiar por $temp_password
        $user->estado = 'Inactivo';
        $user->save();

        // Asginando preguntas al usuario
        $user->asks()->attach($request->question_one, ['anwer'=>Hash::make($request->answer_one)]);
        $user->asks()->attach($request->question_two, ['anwer'=>Hash::make($request->answer_two)]);
        $user->asks()->attach($request->question_three, ['anwer'=>Hash::make($request->answer_three)]);

        $ban = new Ban;
        $ban->user_id = $user->id;
        $ban->blocked = false;
        $ban->active = true;
        $ban->active_at = Carbon::now();
        $ban->save();

        // Envio de email para verificación de cuenta
        Mail::to($user->email)->send(new EmailVerification($user, $user->temp_password)); */
       /* return view('auth.verify', compact('user')); */
    }

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
    protected function create(array $data , Request $request)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}

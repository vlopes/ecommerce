<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\Registered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required|string|min:6',
            ],
            [
                'first_name.required' => 'O campo de nome está vazio.',
                'first_name.max' => 'O nome é grande demais. Por favor tente usar alguma abreviação.',
                'last_name.required' => 'O campo de sobrenome está vazio.',
                'last_name.max' => 'O sobrenome é grande demais. Por favor tente usar alguma abreviação.',
                'email.required' => 'O campo de email está vazio.',
                'email.max' => 'O email fornecido é grande demais, favor cadastrar outro email.',
                'email.unique' => 'O email fornecido ja esta registrado.',
                'password.required' => 'O campo de senha esta vazio.',
                'password.min' => 'A senha deve ter mais do que 6 caracteres.',
                'password.confirmed' => 'A senha deve ser igual a confirmação.',
                'password_confirmation.required' => 'O campo de confirmação de senha esta vazio.',
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'confirmation_code' => base64_encode($data['email']),
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        Mail::to($user->email)->send(new Registered($user));

        return redirect()->route('fodasse');
    }

    public function verify(Request $request, $token)
    {
        $user = User::where('confirmation_code', $token)->firstOrFail();

        $user->confirmed = 1;

        if ($user->save()) {
            return redirect('login');
        }
    }
}

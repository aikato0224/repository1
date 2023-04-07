<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/index';

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
            'username' => ['required', 'min:4', 'max:12'],
            'mail' => ['required','email','min:4','max:12','unique:users'],
            'password' => ['required','min:4','max:12', 'regex:/^[a-zA-Z0-9]+$/','unique:users'],
            'password_confirmation' => ['required', 'same:password'],

        ],[
            'username.required' => '必須項目です',
            'username.min' => '4文字以上で入力してください',
            'username.max' => '12文字以内で入力してください',
            'mail.required' => '必須項目です',
            'mail.email' => 'メールアドレスではありません',
            'mail.min' => '4文字以上で入力してください',
            'mail.max' => '12文字以内で入力してください',
            'mail.unique' => 'すでに登録済です',
            'password.required' => '必須項目です',
            'password.min' => '4文字以上で入力してください',
            'password.max' => '12文字以内で入力してください',
            'password.regex' => '英数字で入力してください',
            'password_confirmation.same' => 'パスワードが一致しません',
            'password_confirmation' => 'パスワードが一致しません',
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
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            $validator = $this->validator($data);
            // dd($validator);
            if ($validator->fails()) {
                // dd($validator);
                return redirect('/register')
                ->withErrors($validator)
                ->withInput();
            } else {
                $this->create($data);
                // dd('mint');
                $user = $data['username'];
                return view('auth.added', compact('user'));
            }
        }
        return view('auth.register');
    }


}

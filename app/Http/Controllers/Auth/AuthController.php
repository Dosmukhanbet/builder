<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Services\AppMailer;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    /**
     * @var Mailer
     */
    private $mailer;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(AppMailer $mailer)
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        $this->mailer = $mailer;
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
            'name' => 'required|max:255',
            'type' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|max:12|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'email' =>$data['email'],
            'name' => $data['name'],
            'type' => $data['type'],
            'city_id' => $data['city_id'],
            'category_id' => $data['category_id'],
            'phone_number' => $data['phone_number'],
            'password' => bcrypt($data['password']),
        ]);

        $this->mailer->sendEmailTo($user, 'email.confirm');

        flash()->success('Спасибо за регистрацию!', 'Подтвердите Ваш электронный адрес, переидя по ссылке отправленный на ваш емэйл!,');

        return $user;
    }




}

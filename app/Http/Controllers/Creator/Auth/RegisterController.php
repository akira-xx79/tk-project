<?php

namespace App\Http\Controllers\Creator\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Models\Creator;

class RegisterController extends Controller
{
    use RegistersUsers;

    // protected $redirectTo = RouteServiceProvider::CREATOR_HOME;
    protected $redirectTo = 'creator/home';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:creator');
    }

    protected function guard()
    {
        return Auth::guard('creator');
    }

    public function showRegistrationForm()
    {
        return view('creator.auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],[], [
            'name' => 'ユーザー名',
            'password' => 'パスワード',
        ]);
    }

    protected function create(array $data)
    {
        return Creator::create([
            'name'     => $data['name'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function redirectPath()
    {
        return 'creator/home';
    }
}

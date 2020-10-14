<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    // Guardの認証方法を指定
    protected function guard()
    {
        return Auth::guard('admin');
    }

    // 新規登録画面
    public function showRegistrationForm()
    {
        return view('admin.auth.register');
    }

    // バリデーション
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

    // 登録処理
    protected function create(array $data)
    {
        return Admin::create([
            'name'     => $data['name'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function redirectPath()
    {
        return 'admin/home';
    }
}

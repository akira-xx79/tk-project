<?php

namespace App\Http\Controllers\Company\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::COMPANY_HOME;

    public function __construct()
    {
        $this->middleware('guest:company')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('company');
    }

    public function showLoginForm()
    {
        return view('company.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|min:4',
        ]);
        if(Auth::guard('company')->attempt(['name'=>$request->input('name'),'password'=>$request->input('password')])){
            return redirect()->intended(route('company.dashboard'));
        }
            return redirect()->back()->with('ログインに失敗しました');
        }

    public function logout(Request $request)
    {
        Auth::guard('company')->logout();

        return $this->loggedOut($request);
    }

    public function loggedOut()
    {
        return redirect(route('company.login'));
    }

    public function username()
    {
        return 'name';
    }

    // public function redirectPath()
    // {
    //     return 'company.dashboard';
    // }
}

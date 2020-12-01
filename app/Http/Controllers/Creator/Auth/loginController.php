<?php

namespace App\Http\Controllers\Creator\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::CREATOR_HOME;

    public function __construct()
    {
        $this->middleware('guest:creator')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('creator');
    }

    public function showLoginForm()
    {
        return view('creator.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|min:4',
        ]);
        if(Auth::guard('creator')->attempt(['name'=>$request->input('name'),'password'=>$request->input('password')])){
            return redirect()->intended(route('creator.dashboard'));
        }
            return redirect()->back()->with('ログインに失敗しました');
        }

    public function logout(Request $request)
    {
        Auth::guard('creator')->logout();

        return $this->loggedOut($request);
    }

    public function loggedOut()
    {
        return redirect(route('creator.login'));
    }

    public function username()
    {
        return 'name';
    }
}

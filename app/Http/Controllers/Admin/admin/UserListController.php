<?php

namespace App\Http\Controllers\Admin\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Creator;
use Illuminate\Support\Facades\Validator;

class UserListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function salesList()
    {
        $list = User::All();

        return view('admin.list.userList')->with(['list' => $list]);
    }

    public function createUserForm()
    {
        $admin_id = auth()->id();

        return view('admin.list.createUser', ['admin_id' => $admin_id]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'         => ['required', 'string', 'max:255'],
            'user_id'      => ['required', 'string', 'max:224'],
            'mail'         => ['required', 'string', 'email:strict,dns,spoof', 'max:255'],
            'password'     => ['required', 'string', 'min:8', 'confirmed'],
        ], [], [
            'name'         => 'ユーザー名',
            'user_id'      => 'ユーザーID',
            'mail'         => 'メールアドレス',
            'password'     => 'パスワード',
        ]);
    }

    public function createUser(Request $request)
    {
        $user = new \App\Models\User();
        $user ->admin_id = $request->admin_id;
        $user ->name = $request->name;
        $user ->user_id = $request->user_id;
        $user ->email = $request->mail;
        $user ->password = bcrypt($request->password);
        $user -> save();

        return redirect()->route('admin.sales.list');
    }

    public function updateForm($id)
    {
        $data = User::find($id);
        return view('admin.userupform', ['data' => $data]);
    }

    public function userupdate(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->password = $request->password;
        $user->save();

        return redirect('/admin/userlist')->with('message', '登録内容を変更しました。');
    }

    public function userdalete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/admin/userlist')->with('message', '登録内容を削除しました。');
    }

    public function creatorList()
    {
        $list = Creator::All();

        return view('admin.list.creatorList')->with(['list' => $list]);
    }

    public function creatordalete($id)
    {
        $user = Creator::find($id);
        $user->delete();

        return redirect('/admin/creatorlist')->with('message', '登録内容を削除しました。');
    }
}

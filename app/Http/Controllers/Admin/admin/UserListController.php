<?php

namespace App\Http\Controllers\Admin\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Creator;

class UserListController extends Controller
{
    public function salesList()
    {
        $list = User::All();

        return view('admin.list.userList')->with(['list' => $list]);
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

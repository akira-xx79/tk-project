<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Creator;
use App\Folder;
use App\Folder_list;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Requests\CreateFolder;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view('folders.create');
    }

    public function create(CreateFolder $request)
    {
        $folder = new Folder();

        $folder -> title = $request->title;
        $folder -> admin_id = Auth::user()->admin_id;

        Auth::user()->folders()->save($folder);
        // Auth::guard('user')->folders()->save($folder);

        return redirect()->route('product.folder', [
            'id' => $folder->id,
        ]);
    }

    public function createList()
    {
        $use = Auth::user();
        $member = $use->creator;

        return view('folders.create_member_list')->with(['member' => $member]);
    }

    public function createUserForm()
    {
        return view('folders.createUserForm');
    }

    public function createUser(Request $request)
    {
        // $current_folder = Folder::find($id);

        $user = new Creator();
        $user ->user_id = auth::id();
        $user ->admin_id = auth::user()->admin_id;
        $user ->name = $request->name;
        $user ->email = $request->mail;
        $user ->password = bcrypt($request->password);
        $user -> save();


        return redirect()->route('create.list')->with('message', '新規ユーザーを登録しました。');

    }

    public function UserList(int $id)
    {
        // $f_id = Folder::find($id)->admin_id;
        $user_id = Auth::user()->admin_id;
        $user_list = Creator::where('admin_id', $user_id)->get();
        // $list = Folder_list::where('creators_id', $user_list)->get();
        $list = Folder_list::where('folder_id', $id)->get();

        return view('folders.create_list', [
            'user_list' => $user_list,
            'id' => $id,
            'list' => $list
        ]);
    }

    public function userdalete($id)
    {
        $user = Creator::find($id);
        $user->delete();

        return redirect('/foldar/{id}/userlist')->with('message', '登録内容を削除しました。');
    }

    public function createdalete($id)
    {
        $user = Creator::find($id);
        $user->delete();

        return redirect('/foldar/createList/{id}')->with('message', '登録内容を削除しました。');
    }


    public function FolderUserSave($id, Request $request)
    {
        $user_list = new Folder_list();
        $user_list->folder_id = $id;
        $user_list->creators_id = $request->input('id');
        $user_list->user_id = $request->input('user');
        $user_list->save();

        // return redirect('/folders/{id}/production')->with('message', 'このファルダーに参加しました。');
        return redirect()->route('product.folder', [
            'id' => $id,
        ])->with('message', 'このファルダーに参加しました。');
    }

    public function menberdelete($id)
    {
        $menber = Folder_list::where('creators_id', $id);
        $menber -> delete();

       return back()->with('message', 'メンバーから退会しました。');
    }

}

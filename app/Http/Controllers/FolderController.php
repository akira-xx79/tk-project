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

        $folder->title = $request->title;

        Auth::user()->folders()->save($folder);
        // Auth::guard('user')->folders()->save($folder);

        return redirect()->route('product.folder', [
            'id' => $folder->id,
        ]);
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
        $user ->name = $request->name;
        $user ->email = $request->mail;
        $user ->password = bcrypt($request->password);
        $user -> save();


        return redirect()->route('user.list')->with('message', '新規ユーザーを登録しました。');

    }

    public function UserList()
    {
        $id = Auth::user();
        $user_list = $id->creator;

        return view('folders.create_list', ['user_list' => $user_list]);
    }

    public function FolderUserSave()
    {

    }

}

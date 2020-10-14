<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Folder;
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
}

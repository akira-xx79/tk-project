<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Folder;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        $folder = $user->folders()->first();

        if(is_null($folder)) {
            return view('home');
        }

        return redirect()->route('product_all', [
            'id' => $folder->id,
        ]);
    }

    public function folder(int $id)
    {
        $folders = Auth::user()->folders()->get();

        // $folders = Folder::All();

        $current_folder = Folder::find($id);

        $product = $current_folder->protection()->with('materiaries')->paginate(10);

        return view('folders.folder.list', [
            'folders' => $folders,
            'current_folder' => $current_folder,
            'current_folder_id' => $current_folder->id,
            'product' => $product,
            ]);
    }
}

<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Production;

class ProductController extends Controller
{
    public function index(Request $request) { // 👈 追加

        $project_deta = Production::where("id")->get();

        return view("admin.list.product_chart",["project_deta" => $project_deta]);

    }

    // public function years() { // 👈 追加

    //     return \App\Production::select('created_at')
    //         ->groupBy('created_at')
    //         ->pluck('created_at');

    // }
}

<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request) { // 👈 追加

        return \App\Production::select('company_name', 'numcer')
            ->where('created_at', $request->created_at)
            ->get();

    }

    public function years() { // 👈 追加

        return \App\Production::select('created_at')
            ->groupBy('created_at')
            ->pluck('created_at');

    }
}

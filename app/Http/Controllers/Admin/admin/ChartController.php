<?php

namespace App\Http\Controllers\Admin\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
    {
        return view('admin.product_chart');
    }
}

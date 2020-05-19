<?php

namespace App\Http\Controllers;

use App\Production;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductionController extends Controller
{
    public function index()
    {
        $production = DB::table('production')->get();
        $txst = ['コテツ','ササミ','散歩','うん汁'];
        return view('home', ['txst' => $txst, 'production' => $production]);
    }
}

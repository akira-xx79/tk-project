<?php

namespace App\Http\Controllers\Admin\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Materiaries;
use App\Categories;
use App\ShipmentLocations;
use App\CreateDelivery;

class UserListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function ChoicsList()
    {
        $materlist = Materiaries::all();
        $catelist = Categories::all();
        $shiplist = ShipmentLocations::all();
        $createlist = CreateDelivery::all();

        return view('admin.list.DBchoice')->wint([
            'materlist'=> $materlist,
            'catelist' => $catelist,
            'shiplist' => $shiplist,
            'createlist' => $createlist
            ]);
    }

    public function ChoicsUpdate(Request $request $id)
    {
        $mater = Materiaries
    }



}
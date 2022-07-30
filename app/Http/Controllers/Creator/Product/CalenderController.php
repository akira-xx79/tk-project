<?php

namespace App\Http\Controllers\Creator\Product;

use App\Calendar;
use App\Folder;
use App\Folder_list;
use App\Http\Controllers\Controller;
use App\Production;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalenderController extends Controller
{
    public function index()
    {
       return view('creator.calendars.calendar');
    }

    public function loadEvents()
    {
        $create  = Auth::user()->id;
        $folder  = Folder_list::where('creators_id', $create)->first();
        $events  = Production::where('folder_id', $folder)->get();
        // $events = Production::all();

        $newArr = [];
        foreach($events as $item){

            $newItem['id'] = $item['id'];
            $newItem['title'] = array($item['contact_number'], $item['completed']);
            $newItem['start'] = $item['date'];
            $newItem['groupId'] = array($item['company_name'], "\n製品名:　", $item['product_name'], "\n数量:    ", $item['numcer']);
            $newItem['name'] = $item['product_name'];
            $newItem['numcer'] = $item['numcer'];
            $newArr[] = $newItem;
        }

        // return response()->json($newArr);
        echo json_encode($newArr);
    }

    // public function getProducto(Request $request)
    // {
    //     $start = $this->formatDate($request->all()['start']);
    //     $end = $this->formstDate($request->all()['end']);

    //     $events = Production::select('id', 'contact_number', 'date')->whereBetween('date', [$start, $end])->get();

    //     $newArr = [];

    //     foreach($events as $item){
    //         $newItem["id"] = $item["event_id"];
    //         $newItem["contact_number"] = $item["number"];
    //         $newItem["start"] = $item["date"];
    //         $newItem[] = $newItem;
    //     }

    //     echo json_encode($newArr);
    // }

    // public function formatDate($date){
    //         require str_replace('T00:00:00+09:00', '', $date);
    // }
}

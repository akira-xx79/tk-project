<?php

namespace App\Http\Controllers\Creator\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Folder;
use App\Production;
use App\Materiaries;
use App\Categories;
use App\Complete;
use App\SupplyMaterial;
use App\ShipmentLocations;
use App\CreateDelivery;
use App\Folder_list;
use Illuminate\Support\Facades\Auth;

class ProdctionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:creator');
    }

    public function index()
    {
        $create  = Auth::user()->id;
        $folder  = Folder_list::where('creators_id', $create)->first();
        $product = Production::where('folder_id', $folder)->orderBy('id', 'desc')->paginate(10);

        return view('creator.prodct.all', ['product' => $product]);
    }


    public function preview(int $id)
    {
        $number = Production::where('id',$id)->get();

        return view('creator.prodct.preview', ['number' => $number]);
    }

    public function delete($id)
    {
       $product = Production::find($id);
       $product->delete();

        return redirect('/folders/1/production')->with('message', '依頼内容を削除しました。');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = Production::query();

        if(!empty($keyword))
        {
            $query->where(
                'contact_number',
                'like',
                '%'.$keyword.'%'
                )->orWhere(
                'company_name',
                'like',
                '%'.$keyword.'%'
                )->orWhere(
                'product_name',
                'like',
                '%'.$keyword.'%'
                );
        }

        $datas = $query->orderBy('created_at','desc')->paginate(10);
        return view('creator.prodct.search')->with('datas', $datas)
        ->with('keyword', $keyword);
    }

    public function SupplyMaterial()
    {
        $supply = SupplyMaterial::orderBy('id', 'desc')->paginate(10);

        return view('creator.prodct.supplyAll')->with('supply', $supply);
    }

    public function Previewz(int $id)
    {
        $number = SupplyMaterial::where('id',$id)->get();

        return view('creator.prodct.supplyPreview', ['number' => $number]);
    }
}

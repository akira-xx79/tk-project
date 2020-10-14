<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Folder;
use App\Http\Requests\CreateProduction;
use App\Http\Requests\CupplyFormRequest;
use App\Production;
use App\Materiaries;
use App\Categories;
use App\Complete;
use App\ShipmentLocations;
use App\CreateDelivery;
use App\SupplyMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class ProductionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $product = Production::paginate(10);

        return view('prodct.all', ['product' => $product]);
    }

    public function completeAll()
    {
        $complete = Production::where('completed', '完了')->paginate(10);

        return view('prodct.completeList')->with([
            'complete' => $complete
        ]);
    }


    public function folder(int $id)
    {
        $folders = Auth::user()->folders()->get();

        // $folders = Folder::All();

        $current_folder = Folder::find($id);

        $product = $current_folder->protection()->with('materiaries')->paginate(10);

        return view('prodct.folder', [
            'folders' => $folders,
            'current_folder' => $current_folder,
            'current_folder_id' => $current_folder->id,
            'product' => $product,
            ]);
    }

    // public function unfinished($data)
    // {
    //     $data = Production::where('completed', '未着手')->get();
    //     dump($data);

    //     return view('prodct.folder', [
    //         'product' => $product,
    //         'data' => $data,
    //         ]);
    // }

    public function product_form(int $id)
    {
        $materiar = Materiaries::all();
        $category = Categories::all();
        $shipment = ShipmentLocations::all();
        $carrier = CreateDelivery::all();

        return view('prodct.create', [
            'folder_id' => $id,
            'materiar' => $materiar,
            'category' => $category,
            'shipment' => $shipment,
            'carrier' => $carrier
        ]);
    }

    public function create(int $id, CreateProduction $request)
    {
        $current_folder = Folder::find($id);

        $product = new \App\Production;
        $product->contact_number = $request->contact_number;
        $product->company_name = $request->company_name;
        $product->category_id = $request->category_id;
        $product->materiar_id = $request->materiar_id;
        $product->product_name = $request->product_name;
        $product->numcer = $request->numcer;
        $product->date = $request->date;
        $product->comment = $request->comment;
        $product->image = $request->file('image')->store('images');
        $product->shipment_location_id = $request->shipment_location_id;
        $product->carrier_id = $request->carrier_id;

        $current_folder->protection()->save($product);



        // $validated = new Production();
        // $validated = $request->validated();

        // $validated->save();

        // $image = $request->file('image');
        // if($request->hasFile('image') && $image->isValid()){
        //     $file_name = $request->file('image')->getClientOriginalName();
        //     $path = $request->file('image')->storeAs('images', '$file_name');
        // }

        // $image->save();
        return redirect()->route('product.folder', [
            'id' => $current_folder->id,
        ])->with('message', '新規依頼を登録しました。');

    }

    public function preview(int $id)
    {
        $number = Production::where('id',$id)->get();
        $compl = Complete::where('production_id', $id)->get();

        return view('prodct.preview', ['number' => $number, 'compl' => $compl]);
    }

    public function updateForm($id)
    {
        $data = Production::find($id);

        return view('prodct.updateForm', ['data' => $data]);
    }

    public function update(CreateProduction $request, $id)
    {
        $product = Production::find($id);
        $product->contact_number = $request->contact_number;
        $product->company_name = $request->company_name;
        $product->category_id = $request->category_id;
        $product->materiar_id = $request->materiar_id;
        $product->product_name = $request->product_name;
        $product->numcer = $request->numcer;
        $product->date = $request->date;
        $product->comment = $request->comment;
        $product->image = $request->file('image')->store('images');
        $product->shipment_location_id = $request->shipment_location_id;
        $product->carrier_id = $request->carrier_id;
        $product->save();

        return redirect('/folders/1/production')->with(['message', '依頼内容を変更しました。']);
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
        return view('prodct.search')->with('datas', $datas)
        ->with('keyword', $keyword);
    }

    public function SupplyMaterial()
    {
        $supply = SupplyMaterial::paginate(10);

        return view('supply.supplyAll')->with('supply', $supply);
    }

    public function SupplyMaterialForm()
    {
        return view('supply.supplyForm');
    }

    public function SupplyMaterialCreate(CupplyFormRequest $request)
    {
        $all = new \App\SupplyMaterial;
        $all->user_id = $request->user_id;
        $all->payee = $request->payee;
        $all->date = $request->date;
        $all->image = $request->file('image')->store('images');
        $all->comment = $request->comment;
        $all->save();

        return redirect('/supply_material/all')->with('message', '依頼内容を登録しました。');
    }
 }

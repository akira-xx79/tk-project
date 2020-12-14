<?php

namespace App\Http\Controllers\Creator\Product;

use Illuminate\Http\Request;
use App\Production;
use App\Complete;
use App\CompleteImag;
use App\SupplyMaterial;
use App\Http\Requests\ComplereForm;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class CreatorController extends Controller
{
    public function index($id)
    {
        $prodct_id = $id;
        $complere = '完了';

        return view('creator.complete.complete')->with([
            'prodct_id' => $prodct_id,
            'complere' => $complere
            ]);
    }

    public function complete(ComplereForm $request)
    {

      if($request->isMethod('POST')) {
//完了変更
        $pro_id = $request->production_id;
        Production::where('id', $pro_id)->update(['completed' => '完了']);

        $complere = Complete::create([
            'production_id' => $request->production_id,
            'creator_id' => $request->creator_id,
            'lead_time' => $request->lead_time,
            'comment'   => $request->comment
        ]);

        // if ($request->hasFile('image')) { //"photo" は input type の name属性
        //     //
        //     // dd('files');
        //     echo 'ファイルがあります';
        //   }else{
        //       echo 'ファイルが在りません。';
        //   }

          foreach ($request->file('image') as $index=> $e) {
            $ext = $e['photo']->guessExtension();
            $filename = "{$request->production_id}_{$index}.{$ext}";
            $path = $e['photo']->storeAs('images', $filename);
        // foreach ($request->file('image') as $index) {
        //     // $filename = "{$request->production_id}_{$index}";
        //     $filename = $index->getClientOriginalName();
        //     $path = $index->storeAs('images', $filename);

            // dd($request->all());
            // var_dump($request->all());

            $complere->completeImag()->create(['image' => $path]);
        }

        return redirect()->route('creator.complete.all')->with('message', '完了登録しました。');
      }
    }

    public function completeAll()
    {
        $complete = Production::where('completed', '完了')->paginate(5);

        return view('creator.complete.complete_list')->with([
            'complete' => $complete
        ]);
    }

    public function ProductionData(int $id)
    {
        $prodct = Production::where('id',$id)->get();
        $complete = Complete::where('production_id', $id)->get();

        // dd($prodct, $complete);

        return view('creator.complete.complete_data')->with([
            'prodct' => $prodct,
            'complete' => $complete
        ]);
    }
}

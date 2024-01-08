<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categoris;
use App\Models\items;

class viewWeb extends Controller
{
    //
    public function showWeb(){
        $kategori = categoris::all();
        $item = items::all();
        $merge = [];
        foreach($kategori as $menu){
            $merge[$menu->title] = items::where("cat_id","=",$menu->id)->get();
        }
        // return response()->json($merge);
        return view('pages.priceList',[
            "kategoris"=>$merge
        ]);
    }
}

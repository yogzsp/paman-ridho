<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categoris;
use App\Models\items;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class DashboardControllers extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.user');
    }
    // for view
    public function showDashboard(){
        $currentUrl = url()->current(); // Full URL including domain
        $basePath = url('/'); // Base URL (domain)
        $urlWithoutDomain = str_replace($basePath, '', $currentUrl);
        return view("pages.dashboard.kategori",[
            "url"=>$urlWithoutDomain,
            "items"=>categoris::all()
        ]);
    }
    public function showListItem($id){
        try{
            $currentUrl = url()->current(); // Full URL including domain
            $basePath = url('/'); // Base URL (domain)
            $urlWithoutDomain = str_replace($basePath, '', $currentUrl);

            if($id != 0){
                $items = items::select("items.*")
                                    ->join("categoris","items.cat_id","=","categoris.id")
                                    ->where("items.cat_id","=",$id)
                                    ->get();
            }else{
                $items = items::all();
            }
            $cats = categoris::all();
            return view("pages.dashboard.items",[
                "cats"=>$cats,
                "items"=>$items,
                "url"=>$urlWithoutDomain    
            ]);
        }catch(\Exception $e){
            // return response()->json(['error' => $e->getMessage()]);
        }
    }

    // for backend upload
    public function addKategori(Request $request){
        try{
            $request->validate([
                'name'=>'required'
            ]);

            DB::table('categoris')->insert([
                'title'=>$request->input('name')
            ]);
            return redirect()->route('home-dashboard')->with('success', 'Berhasil menambahkan kategori');
        } catch (\Exception $e) {
            // Handle error lainnya
            return redirect()->route('home-dashboard')->with('error', 'Gagal menambahkan kategori');
        }
    }

    public function addItem(Request $request){
        try{
            $request->validate([
                'name'=>'required',
                'cat'=>'required',
                'price'=>'required',
                'image'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images/uploads'), $imageName);

            DB::table('items')->insert([
                'name'=>$request->input('name'),
                'price'=>$request->input('price'),
                'cat_id'=>$request->input('cat'),
                'images'=>$imageName
            ]);
            return redirect()->route('list-items',["id"=>0])->with('success', 'Berhasil menambahkan kategori');
        } catch (\Exception $e) {
            // Handle error lainnya
            // return response()->json(['error' => $e->getMessage()]);
        }
    }

    // delete
    public function delKategori($id){
        try{
            $checkData = categoris::find($id);
            if($checkData){
                $checkItem = items::where("cat_id","=",$id);
                if($checkItem->count() > 0){
                    foreach($checkItem->get() as $item){
                        unlink(public_path('images/uploads/'.$item->images));
                    }
                }
                $checkItem->delete();
                $checkData->delete();
                return redirect()->route("home-dashboard")->with("success","Berhasil menghapus data");
            }
        }catch(\Exception $e){
            // return response()->json(['error' => $e->getMessage()]);
        }

        return redirect()->route("home-dashboard")->with("error", "Terjadi kesalahan pada saat eksekusi!");
    }

    public function delItem($id){
        try{
            $checkData = items::find($id);
            if($checkData){
                unlink(public_path('images/uploads/'.$checkData->images));
                $checkData->delete();
                return redirect()->route("list-items",["id"=>0])->with("success","Berhasil menghapus data");
            }
        }catch(\Exception $e){
            // return response()->json(['error' => $e->getMessage()]);
        }

        return redirect()->route("list-items",["id"=>0])->with("error", "Terjadi kesalahan pada saat eksekusi!");
    }
}

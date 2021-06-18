<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Merk;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index()
    {
        $data['items']=DB::table('items')
        ->select('items.id','items.name','items.item_id','items.harga','items.stok','merks.merk','types.jenis')
        ->leftJoin('types','types.id','items.type_id')
        ->leftJoin('merks','merks.id','items.merk_id')
        ->get();
        
        return view('master.barang.index',$data);
    }

    public function add()
    {
        $data['types']=Type::all();
        $data['merks']=Merk::all();
        return view('master.barang.add',$data);
    }

    public function ajaxType(Request $request)
    {
        $fields=DB::table('types')->select('fields')->where('id',$request->type)->first();
        return response()->json([$fields]);
    }

    public function store(Request $request)
    {
        foreach ($_POST as $key => $value) {
            $fieldsValueArray[]=$_POST[$key];
            $fieldsNameArray[]=$key;
        }

        for($i=7;$i<=count($fieldsValueArray)-2;$i++){
            $results[$fieldsNameArray[$i]]=$fieldsValueArray[$i];
        }

        $item=new Item();
        $item->name=$request->namaBarang;
        $item->item_id=$request->idBarang;
        $item->type_id=$request->jenis;
        $item->merk_id=$request->merk;
        $item->harga=$request->harga;
        $item->fields=json_encode($results);
        $item->stok=$request->stok;
        $item->detail=$request->detail;
        $item->save();
        return redirect()->route('master.barang.index');
     
    }

    public function detail($id)
    {
        $data['item']=Item::find($id);
        $data['types']=Type::all();
        $data['merks']=Merk::all();
       
        return view('master.barang.detail',$data);
    }

    public function update(Request $request, $id)
    {
        foreach ($_POST as $key => $value) {
            $fieldsValueArray[]=$_POST[$key];
            $fieldsNameArray[]=$key;
        }

        for($i=7;$i<=count($fieldsValueArray)-2;$i++){
            $results[$fieldsNameArray[$i]]=$fieldsValueArray[$i];
        }
        
        $item=new Item();
        $item=Item::find($id);
        $item->name=$request->namaBarang;
        $item->item_id=$request->idBarang;
        $item->type_id=$request->jenis;
        $item->merk_id=$request->merk;
        $item->harga=$request->harga;
        $item->fields=json_encode($results);
        $item->stok=$request->stok;
        $item->detail=$request->detail;
        $item->save();
        return redirect()->route('master.barang.index');
    }

}

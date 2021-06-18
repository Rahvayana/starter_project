<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index()
    {
        $data['types'] = Type::withCount(['item'])->get();
        return view('master.jenis.index',$data);
    
    }
    public function store(Request $request)
    {
        $jenis=new Type();
        $jenis->jenis=$request->namaJenis;
        $jenis->fields=json_encode($request->fields);
        $jenis->save();
        return redirect()->route('master.jenis.index');
    }

    public function detail($id)
    {
        $data['type']=Type::find($id);
        return view('master.jenis.detail',$data);

    }
    public function update(Request $request,$id)
    {
        $jenis=new Type();
        $jenis=Type::find($id);
        $jenis->jenis=$request->namaJenis;
        $jenis->fields=json_encode($request->fields);
        $jenis->save();
        return redirect()->route('master.jenis.index');
    }
}

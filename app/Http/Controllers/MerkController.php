<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Http\Request;

class MerkController extends Controller
{
    public function index()
    {
        $data['merks']=Merk::all();
        // dd($data);
        return view('master.merk.index',$data);
    }

    public function store(Request $request)
    {
        $folderPath = public_path('uploads/merk/');

        $image_parts = explode(";base64,", $request->iconMerk);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $filename= uniqid() . '.png';
        $file = $folderPath.$filename;
        $uploadMerkIcon=file_put_contents($file, $image_base64);
        if($uploadMerkIcon){
            $merk=new Merk();
            $merk->merk=$request->namaMerk;
            $merk->icon='uploads/merk/'.$filename;
            $merk->save();
            return redirect()->route('master.merk.index');
        }

    }
}

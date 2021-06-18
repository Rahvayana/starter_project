@extends('layouts')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <section class="hk-sec-wrapper">
            <div style="display: flex; align-items: baseline;">
                <h5 class="hk-sec-title">List Data Merk</h5>
                <a href="{{ route('master.merk.tambah') }}"><i class="ion ion-md-add-circle-outline ml-5" style="font-size: 24px"></i></a>
            </div>
            <p class="mb-10">Ini adalah list jenis yang ada, kalian bisa menggunakan pencarian dan filter yang tersedia, tidak menggunakan pagination karena hanya memperlambat process pencarian .</p>
            <div class="row mb-10">
                <div class="col-md-10">
                    <input type="text" name="jenis" class="form-control" placeholder="Jenis">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-success">Pencarian</button>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="table-wrap">
                        <table class="table tablesaw table-bordered table-hover  mb-0" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                            <thead>
                                <tr>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">No</th>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Merk</th>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Logo Merk</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($merks as $merk) 
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td class="title"><a href="{{ route('master.merk.detail',$merk->id) }}">{{$merk->merk}}</a></td>
                                        <td class="title"><img src="{{$merk->icon}}" width="10%" alt="{{$merk->merk}}"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p class="mb-10 mt-10">Menampilkan 10 Dari Total 168 Barang.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
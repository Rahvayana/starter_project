@extends('layouts')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <section class="hk-sec-wrapper">
            <div style="display: flex; align-items: baseline;">
                <h5 class="hk-sec-title">List Data Barang</h5>
                <a href="{{ route('master.barang.tambah') }}"><i class="ion ion-md-add-circle-outline ml-5" style="font-size: 24px"></i></a>
            </div>
            <p class="mb-10">Ini adalah list barang yang ada, kalian bisa menggunakan pencarian dan filter yang tersedia, tidak menggunakan pagination karena hanya memperlambat process pencarian .</p>
            <div class="row mb-10">
                <div class="col-md-10">
                    <input type="text" class="form-control" placeholder="Nama Barang, Merk, Jenis">
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
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">ID Barang</th>
                                    <th scope="col">Merk</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td class="title"><a href="{{ route('master.barang.detail', $item->id) }}">{{$item->name}}</a></td>
                                    <td>{{$item->item_id}}</td>
                                    <td>{{$item->merk}}</td>
                                    <td>{{$item->jenis}}</td>
                                    <td>{{$item->stok}}</td>
                                    <td>Rp.{{number_format($item->harga,1)}}</td>
                                    <td>
                                        <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <div class="media">
                                                <div class="media-body">
                                                    <i class="glyphicon glyphicon-th-large"></i>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                                            <a class="dropdown-item" href="profile.html"><i class="dropdown-icon glyphicon glyphicon-plus"></i><span>Tambah Stok</span></a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="profile.html"><i class="dropdown-icon glyphicon glyphicon-remove"></i><span>Out Of Stock</span></a>
                                        </div>
                                    </td>
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
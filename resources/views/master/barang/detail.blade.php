@extends('layouts')
@section('content')
<section class="hk-sec-wrapper">
    <h5 class="hk-sec-title">Input Data Barang</h5>
    <div class="row">
        <div class="col-sm">
            <form action="{{ route('master.barang.update',$item->id) }}" method="POST">@csrf
                <meta name="csrf-token" content="{{ csrf_token() }}" />
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="namaBarang">Nama Barang</label>
                        <input class="form-control" name="namaBarang" id="namaBarang" placeholder="Nama Barang" value="{{$item->name}}" type="text">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="country">ID Barang</label>
                        <input class="form-control" readonly name="idBarang" id="idBarang" value="{{$item->item_id}}" type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="stok">Stok</label>
                        <input class="form-control" name="stok" id="stok" placeholder="Stok" value="{{$item->stok}}" type="number">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="country">Merk Barang</label>
                        <select class="form-control custom-select d-block w-100" name="merk" id="merk">
                            <option value="">Pilih Merk Barang</option>
                            @foreach ($merks as $merk)
                            @if ($merk->id==$item->merk_id)
                                <option value="{{$merk->id}}" selected>{{$merk->merk}}</option>
                            @else
                                <option value="{{$merk->id}}">{{$merk->merk}}</option>
                            @endif                            
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="harga">Harga</label>
                        <input class="form-control" name="harga" id="harga" placeholder="Harga" value="{{$item->harga}}" type="number">
                    </div>
                    <div class="col-md-6 mb-10">
                        <label for="country">Jenis Barang</label>
                        <select class="form-control custom-select d-block w-100" name="jenis" id="jenis">
                            <option value="">Pilih Jenis Barang</option>
                            @foreach ($types as $type)
                            @if ($type->id==$item->type_id)
                                <option value="{{$type->id}}" selected>{{$type->jenis}}</option>
                            @else
                                <option value="{{$type->id}}">{{$type->jenis}}</option>
                            @endif    
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    @foreach (json_decode($item->fields ) as $key => $field)
                    <div class="col-md-6 form-group">
                        <label for="harga">{{$key}}</label>
                        <input class="form-control" name="{{$key}}" id="{{ $key}}" placeholder="{{ $key}}" value="{{$field}}">
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="detail">Detail</label>
                        <textarea name="detail" id="detail" class="form-control" rows="3" placeholder="Detail">{{$item->detail}}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="form_field" class="form-group"></div>
                    </div>
                </div>
                
                <div class="form-group row mb-0">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@section('script')
    {{-- <script type="text/javascript">
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('#jenis').on('change', function() {
            $("#idBarang").val($(this).find("option:selected").text()+{{date('YmdHis')}})
            $("#form_field").empty()
            $.ajax({
                url: '/ajax-type-barang',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN, 
                    type:this.value
                },
                dataType: 'JSON',
                success: function (data) { 
                    var total_field=JSON.parse(data[0].fields).length
                    var fields=JSON.parse(data[0].fields)
                    for(var i=0;i<total_field;i++){
                        $("#form_field").append('\
                        <div class="form-add-jenis" id="form-parent-field">\
                            <label>'+fields[i]+'</label>\
                            <div class="row">\
                                <div class="col-md-12">\
                                    <input class="form-control" style="margin-bottom : 10px;" type="text" id="field" name="'+fields[i]+'" required>\
                                </div>\
                            </div>\
                        </div>')
                    }   
                }
            }); 
        });
    </script> --}}
@endsection
@extends('layouts')
@section('content')
<section class="hk-sec-wrapper">
    <h5 class="hk-sec-title">Input Data Barang</h5>
    <div class="row">
        <div class="col-sm">
            <form action="{{ route('master.jenis.update',$type->id) }}" method="POST">@csrf
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="namaJenis">Nama Jenis</label>
                        <input class="form-control" name="namaJenis" id="namaJenis" placeholder="" value="{{ $type->jenis }}" type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label class="control-label"><b>Kolom Data</label>
                            <span type="button" class="badge" style="background-color: #29B505;" id="tambah-course"><span class="fa fa-plus" style="color: #FFFFFF;"></span></span>
                            <div class="form-group" id="subcourse">
                                @foreach (json_decode($type->fields) as $field)
                                <div class="form-add-jenis" id="form-{{$loop->iteration}}">
                                    <label>Nama Field</label>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <input class="form-control" style="margin-bottom : 10px;" type="text" id="field" value="{{$field}}" name="fields[]" required>
                                        </div>
                                        <div class="col-md-2">
                                            <span class="btn btn-danger btn btn-block" onclick="remove_sub_course_form('{{$loop->iteration}}')">X</span><br>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                    </div>
                </div>
                
                <div class="form-group row mb-0">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('script')
    <script>
        $("#tambah-course").click(function(){
		var form_length = $(".form-add-jenis").length;
		var form_count = form_length+1;

		$("#subcourse").append('\
        <div class="form-add-jenis" id="form-'+form_count+'">\
                <label>Nama Field</label>\
                <div class="row">\
                    <div class="col-md-10">\
                        <input class="form-control" style="margin-bottom : 10px;" type="text" id="field" name="fields[]" required>\
                    </div>\
                    <div class="col-md-2">\
                        <span class="btn btn-danger btn btn-block" onclick="remove_sub_course_form('+form_count+')">X</span><br>\
                    </div>\
                </div>\
        </div>');
	});

	function remove_sub_course_form(count){
		$("#form-"+count).remove();
    }
    </script>
@endsection
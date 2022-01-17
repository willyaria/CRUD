@extends('layouts.app')

@section('content')

<?php
    foreach ($data_customer as $dt1) {

    }
?>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="form-group">
                        <label>Nama:</label>
                        <input type="hidden" class="form-control" id="id_edit" name="id_edit" value="<?= $dt1->id ?>">
                        <input type="text" class="form-control" id="nama_edit" name="nama_edit" value="<?= $dt1->nama ?>">
                    </div>
                    <div class="form-group">
                        <label>Alamat:</label>
                        <input type="text" class="form-control" id="alamat_edit" name="alamat_edit" value="<?= $dt1->alamat ?>">
                    </div>
                    <div class="form-group">
                        <label>Telp:</label>
                        <input type="text" class="form-control" id="telp_edit" name="telp_edit" value="<?= $dt1->telp ?>">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Registrasi:</label>
                        <input type="date" class="form-control" id="tgl_registrasi_edit" name="tgl_registrasi_edit" value="<?= $dt1->tanggal_registrasi ?>">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-danger" onclick="on_back()">Kembali</button>
                    <button type="submit" class="btn btn-primary" onclick="on_save()">Simpan</button>                   
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  $(document).ready(function () {

  });

  function on_save()
	{
        $.ajax({
			type: "POST",
			url: "{{ url('update_customer') }}",
			data: {	
				"_token"		: "{{ csrf_token() }}",
				id_e	    	: $("#id_edit").val(),
				nm_e	    	: $("#nama_edit").val(),
				almt_e	        : $("#alamat_edit").val(),
				tlp_e		    : $("#telp_edit").val(),
				rgstr_e	    	: $("#tgl_registrasi_edit").val(),
			} ,
			success:function(data){ 				
                // alert('Mantul').then(function(){
                    on_back();
                    // });
            },
			complete:function () {
			}
        });
	}

  function on_back() {
        var url = '{{ url('/home') }}';
        window.open(url, "_self");
    }
</script>

@endsection
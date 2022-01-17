@extends('layouts.app')

@section('content')


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
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label>Alamat:</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <div class="form-group">
                        <label>Telp:</label>
                        <input type="text" class="form-control" id="telp" name="telp">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Registrasi:</label>
                        <input type="date" class="form-control" id="tgl_registrasi" name="tgl_registrasi">
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
			url: "{{ url('create_customer') }}",
			data: {	
				"_token"		: "{{ csrf_token() }}",
				nm	    	    : $("#nama").val(),
				almt	        : $("#alamat").val(),
				tlp		    	: $("#telp").val(),
				rgstr	    	: $("#tgl_registrasi").val(),
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
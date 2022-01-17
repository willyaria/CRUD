@extends('layouts.app')

@section('content')


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- {{ __('You are logged in!') }} -->

                    <div class="container">
 
                        <a href="{{ url('/add_customer') }}"><button type="button" class="btn btn-primary">Tambah</button></a>
                        <br>
                        <br>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No Telp</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($data_customer as $dt1) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $dt1->nama ?></td>
                                    <td><?= $dt1->alamat ?></td>
                                    <td><?= $dt1->telp ?></td>
                                    <td>
                                        <a href="{{ url('/ubah_customer',array($dt1->id)) }}">Edit</a>
                                        <a href="{{ url('/hapus_customer',array($dt1->id)) }}">Hapus</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
  $(document).ready(function () {

  });

</script>


@endsection

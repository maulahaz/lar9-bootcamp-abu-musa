@extends('templates/adminlte/v_admin')
@section('content')

<?php $loggedinInfo = auth()->user(); ?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ $pageTitle }}</h1>
      </div><!-- /.col -->

      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('admin/tugas')}}">Beranda</a></li>
          <li class="breadcrumb-item active">{{ $pageTitle }}</li>
        </ol>
      </div><!-- /.col -->

    </div><!-- /.row -->

    <div class="row">
      <div class="col-sm-12">
        @include('shared.v_msgbox', ['errors'=>$errors])
      </div>
    </div>
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
  	<div class="row">
  	  <div class="col-12">
  	  	<div class="card card-primary card-outline">
          <div class="card-header">
            @if($loggedinInfo->role_id != 1)
            <a href="{{ url('/admin/tugas/create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
            @endif
            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Cari..">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
  	  		<div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Mulai</th>
                    <th>Batas waktu</th>
                    <th>Kategori</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                	<?php $no = 1; ?>
                	@foreach($dtTugas as $row)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$row->title}}</td>
                    <td>{{$row->start_at}}</td>
                    <td>{{$row->deadline_at}}</td>
                    <td>{{$row->category_id}}</td>
                    <td>{{$row->notes}}</td>
                    <td>
                      <a href="{{ url('/admin/tugas/'.$row->id) }}" class="btn btn-sm btn-info"><i class="fa fa-search"></i>&nbsp;Detail</a>
                      <!-- @if($loggedinInfo->role_id != 1) -->
                      <!-- <a href="{{ url('/admin/tugas/'.$row->id.'/edit') }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp;Edit</a> -->
                      <!-- <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{$row->id}}"><i class="fa fa-trash"></i>&nbsp;Delete</button> -->
                      <!-- @endif -->
                    </td>
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
  	      </div>
  	    </div><!-- /.card -->
  	
  	  </div>
  	</div>
  </div>
</section>

<!-- MODAL-DELETE -->
@foreach($dtTugas as $dt)
<div class="modal fade" id="modal-delete-{{$dt->id}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title">DELETE DATA</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure want to delete this data ?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
        <form action="{{ url('admin/tugas', [$dt->id]) }}" method="POST">
          @csrf
          @method('DELETE')
          <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-danger"></i>&nbsp;Yes, Confirm Delete</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach

@endsection
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
            <a href="{{ url('admin/tugas/'.Request::segment(3)) }}" class="btn btn-sm btn-outline-info"><i class="fa fa-chevron-left"></i>&nbsp;Kembali</a>
            <!-- <a href="{{ url('/admin/tugas/create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a> -->
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
                    <th>Nama Siswa</th>
                    <th>Status</th>
                    <th>Tgl Update</th>
                    <th>Nilai</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                	<?php $no = 1; ?>
                	@foreach($dtTugas as $row)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$row->name}}</td>
                    <td>
                        <!-- {{ $row->status ?? 'Belum selesai' }} -->
                        @switch($row->status)
                        @case('selesai')
                        <span class="badge badge-success">Sudah dikerjakan</span>
                        @break
                        @case('disetujui')
                        <span class="badge badge-primary">Tugas disetujui</span>
                        @break
                        @case('ditolak')
                        <span class="badge badge-danger">Tugas ditolak</span>
                        @break
                        @default
                        <span class="badge badge-warning">Belum dikerjakan</span>
                        @endswitch
                    </td>
                    <td>{{$row->updated_at ?? '-'}}</td>
                    <td>{{$row->points ?? '0'}}</td>
                    <td>{{$row->notes ?? '-'}}</td>
                    <td>
                    @if($row->teID != null)
                      <a href="{{ url('tugas-exec/'.$row->teID.'/edit') }}" class="btn btn-sm btn-info"><i class="fa fa-check-square"></i>&nbsp;Response</a>
                    @else
                      -
                    @endif
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
<div class="modal fade" id="modal-delete-{{$dt->teID}}">
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
        <form action="{{ url('admin/tugas', [$dt->teID]) }}" method="POST">
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
@extends('templates/adminlte/v_admin')
@section('content')
<?php $loggedinInfo = auth()->user(); ?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ $pageTitle }}</h1>
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('admin/tugas')}}">Beranda</a></li>
          <li class="breadcrumb-item active">{{ $pageTitle }}</li>
        </ol>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-sm-12">
        @include('shared.v_msgbox', ['errors'=>$errors])
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <!-- Area: Tambah data -->
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
                <tr class="text-center">
                  <th>No.</th>
                  <th>Judul</th>
                  <th>Batas waktu</th>
                  <th>Status</th> 
                  <th>Nilai</th>
                  <th>Tgl Update</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                @if(count($dtTugas))
                @foreach($dtTugas as $row)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$row->title}}</td>
                  <td>{{$row->deadline_at}}</td>
                  <td class='text-center'>
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
                  <!-- <td class='text-center' style="{{ ($row->status) ? null : 'color: red'}}"><?//($row->status) ? $row->status : 'Belum dikerjakan'?></td> -->
                  <td>{{($row->points) ? $row->points : '---'}}</td>
                  <td>{{($row->tex_update) ? $row->tex_update : '---'}}</td>
                  <td>{{($row->tex_notes )? $row->tex_notes : '---'}}</td>
                  <td>
                    <a href="{{ url('tugas-exec/'.$row->tid) }}" class="btn btn-sm btn-info"><i class="fa fa-search"></i>&nbsp;Detail</a>
                  </td>
                </tr>
                @endforeach
                @else
                <tr>
                  <td colspan="7" class="text-center">Data tidak ada</td>
                </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.card -->
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
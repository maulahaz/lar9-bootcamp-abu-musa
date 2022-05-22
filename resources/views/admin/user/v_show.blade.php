@extends('templates/adminlte/v_admin')
@section('content')
<?php $loggedinInfo = auth()->user(); ?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <h1><?= $pageTitle ?> <span class="smaller hide-sm">(Record ID: <?= $updateID ?>)</span></h1>
        <div class="row" id="msgBox">
          <div class="col-sm-12">
            @include('shared.v_msgbox', ['errors'=>$errors])
          </div>
        </div>
        <div class="card mt-3">
          <div class="card-header">
            <h3 class="card-title">Opsi</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <a href="{{ url('/admin/user') }}" class="btn btn-sm btn-outline-info"><i class="fa fa-chevron-left"></i>&nbsp;List Data</a>
            @if($loggedinInfo->role_id != 1)
            <a href="{{ url('/admin/user/'.$dtUser->id.'/edit') }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp;Edit Data</a>
            <button type="button" class="btn btn-sm btn-outline-danger confirmation" data-flag="0" data-action="reset" data-id="{{$dtUser->id}}" data-controller="reset-password/{{$dtUser->id}}"><i class="fa fa-undo"></i>&nbsp;Reset Password</button>
            <button type="button" class="btn btn-sm btn-danger float-right" data-toggle="modal" data-target="#modal-delete-{{$dtUser->id}}"><i class="fa fa-trash"></i>&nbsp;Hapus Data</button>
            @endif
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <div class="row">
      <div class="col-md-9 col-sm-7">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Detail</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="record-details">
              <dl class="row">
                <dt class="col-sm-3">nama</dt>
                <dd class="col-sm-9">: {{$dtUser->name }}</dd>
                <dt class="col-sm-3">Alamat Email</dt>
                <dd class="col-sm-9">: {{$dtUser->email }}</dd>
                <dt class="col-sm-3">Status</dt>
                <dd class="col-sm-9">: {{$dtUser->status }}</dd>
                <dt class="col-sm-3">Jabatan</dt>
                <dd class="col-sm-9">: {{$dtUser->role_id}}</dd>
                <dt class="col-sm-3">Tanggal Dibuat</dt>
                <dd class="col-sm-9">: {{$dtUser->created_at}}</dd>
                <dt class="col-sm-3">Terakhir Update</dt>
                <dd class="col-sm-9">: {{$dtUser->updated_at}}</dd>
              </dl>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="col-md-3 col-sm-5">
        <!-- CARD GAMBAR -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Gambar</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            @if (empty($dtUser->picture))
            <form name="frm_upload" action="{{ url('admin/user/upload-picture/'.$dtUser->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <div class="text-center"><img class="profile-user-img img-fluid img-circle mb-3" src="{{ url('images/noimage.jpg') }}" alt="Gambar"></div>
              <p class="text-center">Gambar belum ada.</p>
              <p class="text-center">Silahkan pilih gambar kemudian tekan UPLOAD.</p>
              <div class="input-group mb-2">
                <div class="custom-file">
                  <input type="file" name="picture" class="custom-file-input">
                  <label class="custom-file-label" for="foto">Masukan File Gambar</label>
                </div>
              </div>
              <button type="submit" name="Upload" class="btn btn-sm btn-info btn-block">Upload</button>
            </form>
            @else
            <div class="text-center">
              <!-- ONLY USER IT'SELF WHO CAN DELETE/CHANGE THIS PICT -->
              <!-- <p><button class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete-picture-modal"><i class="fa fa-times"></i> Hapus & Ganti Gambar</button></p> -->
              <p style="width:200px; text-align: center; display: inline-block;">
                <img src="{{ url('uploads/user/'.$dtUser->picture) }}" alt="picture preview" class="img-fluid">
              </p>
            </div>
            @endif
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- DELETE DATA -->
<!-- ===================================================== -->
<div class="modal fade" id="modal-delete-{{$dtUser->id}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title">Hapus Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ?</p>
        <p>Anda akan menghapus data. Setelah di eksekusi, proses ini tidak dapat dibatalkan. Apakah Anda benar-benar ingin melakukan nya?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <form action="{{ url('admin/user', [$dtUser->id]) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-check"></i>&nbsp;Ya, Hapus data!</button>
        </form>
        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Batal</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- DELETE PICTURE -->
<!-- ===================================================== -->
<div class="modal fade" id="delete-picture-modal" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <form class="form-horizontal" action="{{url('admin/user/delete-picture', [$dtUser->id])}}" method="POST">
      @method('DELETE')
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><i class="fa fa-trash"></i> Hapus Gambar</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin ?</p>
          <p>Anda akan menghapus gambar. Setelah di eksekusi, proses ini tidak dapat dibatalkan. Apakah Anda benar-benar ingin melakukan nya?</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-check"></i>&nbsp;Ya, Hapus gambar!</button>
          <button class="btn btn-sm btn-default" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Batal</button>
        </div>
      </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endsection
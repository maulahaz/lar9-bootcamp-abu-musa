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
            <a href="{{ url('/admin/kursus') }}" class="btn btn-sm btn-outline-info"><i class="fa fa-chevron-left"></i>&nbsp;List Data</a>
            <a href="{{ url('/admin/kursus/'.$dtKursus->id.'/edit') }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp;Edit Data</a>
            <button type="button" class="btn btn-sm btn-danger float-right" data-toggle="modal" data-target="#modal-delete-{{$dtKursus->id}}"><i class="fa fa-trash"></i>&nbsp;Hapus Data</button>
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
                <dt class="col-sm-3">Nama Kursus</dt>
                <dd class="col-sm-9">: {{$dtKursus->title }}</dd>
                <dt class="col-sm-3">Pemateri</dt>
                <dd class="col-sm-9">: {{$dtKursus->author }}</dd>
                <dt class="col-sm-3">Harga</dt>
                <dd class="col-sm-9">: {{$dtKursus->price }}</dd>
                <dt class="col-sm-3">Kategori</dt>
                <dd class="col-sm-9">: {{$dtKursus->category }}</dd>
                <dt class="col-sm-3">Keterangan</dt>
                <dd class="col-sm-9">: {{$dtKursus->description }}</dd>
                <dt class="col-sm-3">Tanggal Dibuat</dt>
                <dd class="col-sm-9">: {{$dtKursus->created_at}}</dd>
                <dt class="col-sm-3">Terakhir Update</dt>
                <dd class="col-sm-9">: {{$dtKursus->updated_at}}</dd>
              </dl>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

      <div class="col-md-3 col-sm-5" style="display: block;">
        <!-- CARD GAMBAR -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Gambar</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            @if (empty($dtKursus->picture))
            <form name="frm_upload" action="{{ url('admin/kursus/upload-picture/'.$dtKursus->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
              <p><button class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete-picture-modal"><i class="fa fa-times"></i> Hapus & Ganti Gambar</button></p>
              <p style="width:200px; text-align: center; display: inline-block;">
                <img src="{{ url('uploads/kursus/'.$dtKursus->picture) }}" alt="picture preview" class="img-fluid">
              </p>
            </div>
            @endif
          </div>
          <!-- /.card-body -->
        </div>

      </div>

    </div>

  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- DELETE DATA -->
<!-- ===================================================== -->
<div class="modal fade" id="modal-delete-{{$dtKursus->id}}">
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
      <form action="{{ url('admin/kursus', [$dtKursus->id]) }}" method="POST">
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
      <form class="form-horizontal" action="{{url('admin/kursus/delete-picture', [$dtKursus->id])}}" method="POST">
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
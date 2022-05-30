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
            <a href="{{ url('tugas-exec') }}" class="btn btn-sm btn-outline-info"><i class="fa fa-chevron-left"></i>&nbsp;List Data</a>

            <!-- Upload Tugas sama kaya CREATE NEW DATA di tbl_tugas_exec -->
            <!-- if(empty($dtTugas->evidence)) -->
            @if(empty($dtTugas->status))
            <!-- Klo ga ada attachment atau Status nya masih kosong, buat data baru di tbl_tugas_exec -->
            <a href="{{ url('tugas-exec/create/'.$updateID) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp;Upload Tugas</a>
            @else
            <!-- Klo ADA attachment, EDIT data (tbl_tugas_exec) yg aktive di show -->
              @if($loggedinInfo->role_id == 1)
              <!-- Klo USER: Murid, maka "Edit Tugas (cek executionID)" -->
              <a href="{{ url('tugas-exec/'.$dtTugas->texId.'/edit') }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp;Edit Tugas</a>
              @else
              <!-- Klo USER: Guru, maka "Periksa/Approval Tugas" -->
              <a href="{{ url('tugas-exec/'.$dtTugas->texId.'/edit') }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp;Periksa Tugas</a>
              @endif
            
            @endif

            @if($loggedinInfo->role_id != 1)
            <a href="{{ url('tugas-exec/'.$dtTugas->id.'/edit') }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp;Response Tugas</a>
            <button type="button" class="btn btn-sm btn-danger float-right" data-toggle="modal" data-target="#modal-delete-{{$dtTugas->id}}"><i class="fa fa-trash"></i>&nbsp;Hapus Data</button>
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
                <dt class="col-sm-3">Judul Tugas</dt>
                <dd class="col-sm-9">: {{$dtTugas->title }}</dd>
                <dt class="col-sm-3">Tanggal Mulai</dt>
                <dd class="col-sm-9">: {{$dtTugas->start_at }}</dd>
                <dt class="col-sm-3">Batas Waktu</dt>
                <dd class="col-sm-9">: {{$dtTugas->deadline_at }}</dd>
                <dt class="col-sm-3">Kategori</dt>
                <dd class="col-sm-9">: {{$dtTugas->category_id }}</dd>
                <dt class="col-sm-3">Catatan</dt>
                <dd class="col-sm-9">: {{$dtTugas->tgNotes }}</dd>
                <dt class="col-sm-3">Dibuat Oleh</dt>
                <dd class="col-sm-9">: {{$dtTugas->created_by}}</dd>
                <!-- <dt class="col-sm-3">Tanggal Dibuat</dt>
                  <dd class="col-sm-9">: {{$dtTugas->created_at}}</dd>
                  <dt class="col-sm-3">Diupdate Oleh</dt>
                  <dd class="col-sm-9">: {{$dtTugas->updated_by}}</dd>
                  <dt class="col-sm-3">Terakhir Update</dt>
                  <dd class="col-sm-9">: {{$dtTugas->updated_at}}</dd> -->
                <dt class="col-sm-12 text-primary">--- PENGERJAAN TUGAS ---</dt>
                <dt class="col-sm-3">Status</dt>
                <dd class="col-sm-9">: 
                  @switch($dtTugas->status)
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
                </dd>
                <dt class="col-sm-3">Catatan Murid</dt>
                <dd class="col-sm-9">: {{$dtTugas->exeNotes }}</dd>
                <dt class="col-sm-3">Tanggal Update</dt>
                <dd class="col-sm-9">: {{$dtTugas->updated_at }}</dd>
                <dt class="col-sm-3">Diupdate oleh</dt>
                <dd class="col-sm-9">: {{$dtTugas->doneBy }}</dd>
                <dt class="col-sm-3">Nilai</dt>
                <dd class="col-sm-9">: {{$dtTugas->points }}</dd>
                <dt class="col-sm-3">Catatan Pemeriksa</dt>
                <dd class="col-sm-9">: {{$dtTugas->notes2 }}</dd>
                
              </dl>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="col-md-3 col-sm-5">
        <!-- CARD Lampiran -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Lampiran</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            @if (empty($dtTugas->evidence))
            <div class="text-center"><img class="img-fluid img-circle mb-3" src="{{ url('images/nofile.jpg') }}" alt="Lampiran"></div>
            <p class="text-center">Lampiran belum ada.</p>
            <!-- <form action="{{ url('tugas-exec/upload-file/'.$updateID) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
              @csrf
              <div class="text-center"><img class="img-fluid img-circle mb-3" src="{{ url('images/nofile.jpg') }}" alt="Lampiran"></div>
              <p class="text-center">Lampiran belum ada.</p>
              <p class="text-center">Silahkan masukan file lampiran Tugas, kemudian tekan UPLOAD.</p>
              <div class="input-group mb-2">
                <div class="custom-file">
                  <input type="file" name="tugas-file" class="custom-file-input">
                  <label class="custom-file-label" for="foto">Masukan File Lampiran</label>
                </div>
              </div>
              <button type="submit" name="Upload" class="btn btn-sm btn-info btn-block">Upload</button>
            </form> -->
            @else
            <div class="text-center">
              <!-- Tombol Hapus Di jangan di tampilkan, Hapus bisa lewat Edit Siswa: -->
              <p style="display: none;"><button class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete-file-modal"><i class="fa fa-times"></i> Hapus & Ganti Lampiran</button></p>
              <p style="width:200px; text-align: center; display: inline-block;">
                <a href="{{ url('uploads/tugas_exec/'.$dtTugas->evidence) }}"><i class="fa fa-file"></i>&nbsp;File Tugas</a>
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
<div class="modal fade" id="modal-delete-{{$dtTugas->id}}">
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
        <form action="{{ url('admin/materi', [$dtTugas->id]) }}" method="POST">
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
<div class="modal fade" id="delete-file-modal" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <form class="form-horizontal" action="{{url('tugas-exec/delete-file', [$dtTugas->id])}}" method="POST">
      @method('DELETE')
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><i class="fa fa-trash"></i> Hapus Lampiran</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin ?</p>
          <p>Anda akan menghapus file lampiran. Setelah di eksekusi, proses ini tidak dapat dibatalkan. Apakah Anda benar-benar ingin melakukan nya?</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-check"></i>&nbsp;Ya, Hapus lampiran!</button>
          <button class="btn btn-sm btn-default" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Batal</button>
        </div>
      </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endsection
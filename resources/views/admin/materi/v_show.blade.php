@extends('templates/adminlte/v_admin')
@section('content')

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
            <h3 class="card-title">Options</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <a href="{{ url('/admin/materi') }}" class="btn btn-sm btn-outline-info"><i class="fa fa-chevron-left"></i>&nbsp;List Data</a>
            <a href="{{ url('/admin/materi/'.$dtMateri->id.'/edit') }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp;Edit</a>
            <button type="button" class="btn btn-sm btn-danger float-right" data-toggle="modal" data-target="#modal-delete-{{$dtMateri->id}}"><i class="fa fa-trash"></i>&nbsp;Delete Data</button>
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
            <h3 class="card-title">Data Details</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="record-details">
              <dl class="row">
                <dt class="col-sm-3">Judul Materi</dt>
                <dd class="col-sm-9">: {{$dtMateri->title }}</dd>
                <dt class="col-sm-3">Kategori</dt>
                <dd class="col-sm-9">: {{$dtMateri->category }}</dd>
                <dt class="col-sm-3">Link Video</dt>
                <dd class="col-sm-9">: {{$dtMateri->video_url }}</dd>
                <dt class="col-sm-3">Di buat oleh</dt>
                <dd class="col-sm-9">: {{$dtMateri->author }}</dd>
                <dt class="col-sm-3">Catatan</dt>
                <dd class="col-sm-9">: {{$dtMateri->notes }}</dd>
                <dt class="col-sm-3">Tanggal Dibuat</dt>
                <dd class="col-sm-9">: {{$dtMateri->created_at}}</dd>
                <dt class="col-sm-3">Terakhir Update</dt>
                <dd class="col-sm-9">: {{$dtMateri->updated_at}}</dd>
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
            @if (empty($dtMateri->picture))
            <form name="frm_upload" action="{{ url('admin/materi/uploadfile/'.$dtMateri->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <?php echo "<p>Please choose a picture from your computer and then press 'Upload'.</p>" ?>
              <div class="input-group mb-2">
                <div class="custom-file">
                  <input type="file" name="picture" class="custom-file-input">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
              </div>
              <button type="submit" name="Upload" class="btn btn-sm btn-info btn-block">Upload</button>
            </form>
            @else
            <div class="text-center">
              <p><button class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete-picture-modal"><i class="fa fa-trash"></i> Delete Picture</button></p>
              <p style="width:200px; text-align: center; display: inline-block;">
                <img src="{{ url('uploads/materi/'.$dtMateri->picture) }}" alt="picture preview" class="img-fluid">
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

<!-- MODAL-DELETE -->
<div class="modal fade" id="modal-delete-{{$dtMateri->id}}">
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
        <form action="{{ url('admin/materi', [$dtMateri->id]) }}" method="POST">
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

@endsection
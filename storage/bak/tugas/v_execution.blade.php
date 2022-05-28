@extends('templates/adminlte/index')
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
          <li class="breadcrumb-item"><a href="{{url('tugas')}}">Home</a></li>
          <li class="breadcrumb-item active">{{ $pageTitle }}</li>
        </ol>
      </div><!-- /.col -->

    </div><!-- /.row -->

    @include('shared.msgbox', ['errors'=>$errors])    

  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-12">
        <!-- Horizontal Form -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Form {{ $pageTitle }}</h3>
          </div>
          <!-- /.card-header -->

          <!-- form start -->
            @if (!empty($dtTugas))
            <form action="{{ $formActionLink }}" class="form-horizontal" id="frm_update" name="frm_update" method="POST" enctype="multipart/form-data">
              @method('PATCH')

            @else

            <form id="frm_create" name="frm_create" action="{{ $formActionLink }}" method="POST" class="form-horizontal" enctype="multipart/form-data">  
                
            @endif

            {{ csrf_field() }}
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Judul Tugas</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="title" value="{{ !empty($dtTugas) ? $dtTugas->tgTitle : null }}" placeholder="Isi Judul Materi" {{($loggedinInfo->role_id != 1) ? 'disabled' : null}}>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Upload Tugas</label>
                <div class="col-sm-6">
                  <div class="input-group mb-2">
                    <div class="custom-file">
                      <input type="hidden" name="file-tugas" value="{{!empty($dtTugas) ? $dtTugas->evidence : null }}">
                      <input type="file" class="custom-file-input" id="file-tugas" name="file-tugas" {{($loggedinInfo->role_id != 1) ? 'disabled' : null}}>
                      <label class="custom-file-label" for="foto">Masukan File Gambar</label>
                    </div>
                    
                  </div>
                  <strong>Current file : </strong><a href="" target="_blank">{{!empty($dtTugas) ? $dtTugas->evidence : 'No file' }}</a>
                </div>
              </div>

              @if($loggedinInfo->role_id != 1)
              <!-- KLO yang login GURU, maka ada tombol Change Status dan Point -->
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-4">
                  <?php $optSatus = ['ditolak'=>'Ditolak', 'disetujui'=>'Disetujui']?>
                  <!-- Pilihan: 'selesai'=>'Selesai Dikerjakan', hanya utk Murid -->
                  <select name="status" id="status" class="form-control">
                    <option value="" holder>--Please select--</option>
                    @foreach($optSatus as $key => $value)
                    <option value="<?= $key ?>" @if(!empty($dtTugas) && $dtTugas->status == $key) selected @endif><?= $value ?></option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nilai</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="points" value="{{ !empty($dtTugas) ? $dtTugas->points : null }}" placeholder="Isi Nilai Tugas">
                </div>
              </div>
              
              @endif

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Catatan</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="notes" id="notes" rows="4" placeholder="Isi Catatan">{{ !empty($dtMateri) ? $dtMateri->notes : null }}</textarea>
                </div>
              </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-save"></i> Save</button>
              <a href="{{ url('tugas') }}" class="btn btn-sm btn-default"><i class="fa fa-times"></i> Cancel</a>
            </div>
            <!-- /.card-footer -->
          </form>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->

  </div><!-- /.container-fluid -->
</section>
@stop
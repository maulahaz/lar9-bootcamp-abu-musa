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
          <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
          <li class="breadcrumb-item active">{{ $pageTitle }}</li>
        </ol>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    @include('shared.v_msgbox', ['errors'=>$errors])    
  </div>
  <!-- /.container-fluid -->
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
            
          @if (!empty($dtTugas))
          <form action="{{ url('tugas-exec', $updateID) }}" class="form-horizontal" name="frm_update" method="POST">
            @method('PATCH')
            @else
          <form name="frm_create" action="{{ url('tugas-exec') }}" method="POST" class="form-horizontal">
            @endif
            {{ csrf_field() }}
            <div class="card-body">
                  

                @if(empty($dtTugas->evidence))
            <!-- <div class="input-group">
              <div class="custom-file">
                <input type="file" name="tugas-file" class="custom-file-input">
                <label class="custom-file-label" for="foto">Masukan File Lampiran</label>
              </div>
              
              <button type="submit" name="Upload" class="btn btn-sm btn-info ml-2">Upload</button>
            </div> -->
            <form action="{{ url('tugas-exec/upload-file/') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
            </form>
            
          @else
            <p>
              <a href="{{ url('uploads/tugas_exec/'.$dtTugas->evidence) }}"><i class="fa fa-file"></i>&nbsp;Lampiran Tugas</a>
              <button class="btn btn-sm btn-outline-danger ml-3" data-toggle="modal" data-target="#delete-file-modal"><i class="fa fa-times"></i> Hapus & Ganti Lampiran</button>
            </p>
          @endif
              <!-- <div class="form-group row">
                <label class="col-sm-4 col-form-label">File Lampiran</label>
                <div class="col-sm-8">
                  
                </div>
              </div> -->
              <!-- form start -->







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
                      <textarea class="form-control" name="notes" id="notes" rows="4" placeholder="Isi Keterangan">{{ !empty($dtTugas) ? $dtTugas->notes : old('notes') }}</textarea>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-save"></i>&nbsp;Simpan</button>
                  <a href="{{ url()->previous() }}" class="btn btn-sm btn-default"><i class="fa fa-times"></i>&nbsp;Batal</a>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
@stop
@push('scripts')
<script></script>
@endpush
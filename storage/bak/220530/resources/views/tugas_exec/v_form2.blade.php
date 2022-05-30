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
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ $formActionLink }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Lampiran Tugas</label>
                <div class="col-sm-6">
                  <div class="input-group mb-2">
                    <div class="custom-file">
                      <input type="hidden" name="current-tugas-file" value="{{ !empty($dtTugas) ? $dtTugas->evidence : null }}">
                      <input type="file" name="tugas-file" class="custom-file-input" accept=".zip,.rar,.7zip" {{($loggedinInfo->role_id != 1)?'disabled':NULL}}>
                      <label class="custom-file-label" for="foto">Masukan File Lampiran</label>
                    </div>
                    @if(!empty($dtTugas))
                    <a href="{{ url('uploads/tugas_exec/'.$dtTugas->evidence) }}" class="btn btn-sm btn-info ml-3"><i class="fa fa-file"></i>&nbsp;File Tugas</a>
                    @endif
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Catatan</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="notes" id="notes" rows="4" placeholder="Isi Keterangan" {{($loggedinInfo->role_id != 1) ? 'readonly' : NULL}}>{{ !empty($dtTugas) ? $dtTugas->notes : old('notes') }}</textarea>
                </div>
              </div>
              <hr>
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
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Catatan Pemeriksa</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="notes2" id="notes2" rows="4" placeholder="Isi Keterangan">{{ !empty($dtTugas) ? $dtTugas->notes2 : old('notes2') }}</textarea>
                </div>
              </div>
              @endif
              
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <input type="hidden" name="tugas_id" value="{{ !empty($dtTugas) ? $dtTugas->tugas_id : null }}">
              <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-save"></i>&nbsp;Simpan</button>
              <a href="javascript:history.back()" class="btn btn-sm btn-default"><i class="fa fa-times"></i>&nbsp;Batal</a>
            </div>
            <!-- /.card-footer -->
          </form>
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
<script>
  $(function () {
    //Date picker
    $('#start_date').datetimepicker({
        format: 'DD-MMM-YYYY'
    });
    $('#deadline_date').datetimepicker({
        format: 'DD-MMM-YYYY'
    });
  });
</script>
@endpush
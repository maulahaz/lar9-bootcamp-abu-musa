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
          <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
          <li class="breadcrumb-item active">{{ $pageTitle }}</li>
        </ol>
      </div><!-- /.col -->

    </div><!-- /.row -->

    @include('shared.v_msgbox', ['errors'=>$errors])    

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
            <form action="{{ url('admin/tugas', $updateID) }}" class="form-horizontal" id="frm_update" name="frm_update" method="POST">
              @method('PATCH')

            @else

            <form id="frm_create" name="frm_create" action="{{ url('admin/tugas') }}" method="POST" class="form-horizontal">  
                
            @endif

            {{ csrf_field() }}
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Judul Tugas</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="title" value="{{ !empty($dtTugas) ? $dtTugas->title : old('title') }}" placeholder="Isi Judul Tugas">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Waktu Mulai</label>
                <div class="col-sm-2">
                  <div class="input-group date" id="start_date" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" data-target="#start_date" name="start_at" value="{{ !empty($dtTugas) ? $dtTugas->start_at : old('start_at') }}">
                      <div class="input-group-append" data-target="#start_date" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
                </div>
                  
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Batas Waktu</label>
                <div class="col-sm-2">
                  <div class="input-group date" id="deadline_date" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" data-target="#deadline_date" name="deadline_at" value="{{ !empty($dtTugas) ? $dtTugas->deadline_at : old('deadline_at') }}">
                      <div class="input-group-append" data-target="#deadline_date" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
                </div>
                  
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="category_id" value="{{ !empty($dtTugas) ? $dtTugas->category_id : old('category_id') }}" placeholder="Isi Kategori">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="notes" id="notes" rows="4" placeholder="Isi Keterangan">{{ !empty($dtTugas) ? $dtTugas->notes : old('notes') }}</textarea>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
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

  </div><!-- /.container-fluid -->
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
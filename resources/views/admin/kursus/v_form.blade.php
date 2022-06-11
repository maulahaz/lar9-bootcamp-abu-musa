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
            @if (!empty($dtKursus))
            <form action="{{ url('admin/kursus', $updateID) }}" class="form-horizontal" id="frm_update" name="frm_update" method="POST">
              @method('PATCH')

            @else

            <form id="frm_create" name="frm_create" action="{{ url('admin/kursus') }}" method="POST" class="form-horizontal">  
                
            @endif

            {{ csrf_field() }}
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Kursus</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="title" value="{{ !empty($dtKursus) ? $dtKursus->title : old('title') }}" placeholder="Isi Nama Kursus">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Pemateri</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="author" value="{{ !empty($dtKursus) ? $dtKursus->author : old('author') }}" placeholder="Isi Pemateri Kursus">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="price" value="{{ !empty($dtKursus) ? $dtKursus->price : old('price') }}" placeholder="Isi Harga Kursus">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="category" value="{{ !empty($dtKursus) ? $dtKursus->category : old('category') }}" placeholder="Isi Kategori Kursus">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="description" id="description" rows="4" placeholder="Isi Keterangan">{{ !empty($dtKursus) ? $dtKursus->description : old('description') }}</textarea>
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

</script>
@endpush
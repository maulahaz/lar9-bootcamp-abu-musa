@extends('templates/adminlte/v_admin')
@section('content')

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
      <div class="col-6">
        <!-- Horizontal Form -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Form {{ $pageTitle }}</h3>
          </div>
          <!-- /.card-header -->

          <!-- form start -->
            <form action="{{ url('account/changepass') }}" method="POST" class="form-horizontal">

              {{ csrf_field() }}
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Password Lama</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" name="old_pwd" placeholder="Password Lama">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Password Baru</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" name="password" placeholder="Password Baru">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Ulangi Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Ulangi Password">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-save"></i>&nbsp;Simpan</button>
                <a href="{{ url('account/profile') }}" class="btn btn-sm btn-default"><i class="fa fa-times"></i>&nbsp;Batal</a>
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
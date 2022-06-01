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
          <li class="breadcrumb-item"><a href="{{url('admin')}}">Beranda</a></li>
          <li class="breadcrumb-item active">--</li>
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
            @if (!empty($dtUser))
            <form action="{{ url('admin/user', $updateID) }}" class="form-horizontal" id="frm_update" name="frm_update" method="POST">
              @method('PATCH')

            @else

            <form id="frm_create" name="frm_create" action="{{ url('admin/user') }}" method="POST" class="form-horizontal">  
                
            @endif

            {{ csrf_field() }}
            <div class="card-body">

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-3">
                  <select name="status" id="status" class="form-control" required>
                    <option value="">--Pilih--</option>
                    <?php $optStatus = ['Active'=>'Active', 'Inactive'=>'Inactive']; ?>
                    
                    @foreach ($optStatus as $key => $value)
                        <option value="{{ $key }}" {{ (!empty($dtUser) && ($dtUser->status == $key)) ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                  </select>
                  <!-- <input type="text" class="form-control" name="status" value="{{ !empty($dtUser) ? $dtUser->status : old('status') }}" placeholder="Isi Status Pengguna"> -->
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Role/Jabatan</label>
                <div class="col-sm-3">
                    <select name="role_id" id="role_id" class="form-control" required>
                        <option value="">--Pilih--</option>
                        <?php $optRoles = [1=>'Staff', 2=>'Supervisor', 3=>'Manager', 5=>'Administrator']; ?>
                        
                        @foreach ($optRoles as $key => $value)
                            <option value="{{ $key }}" {{ (!empty($dtUser) && ($dtUser->role_id == $key)) ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    <!-- <input type="text" class="form-control" name="role_id" value="{{ !empty($dtUser) ? $dtUser->role_id : old('role_id') }}" placeholder="Isi Jabatan Pengguna"> -->
                </div>
              </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-save"></i>&nbsp;Simpan</button>
              <a href="{{ url('admin/user') }}" class="btn btn-sm btn-default"><i class="fa fa-times"></i>&nbsp;Batal</a>
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

@section('jsFile')
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
@stop
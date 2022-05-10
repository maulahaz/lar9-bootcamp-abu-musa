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
          <li class="breadcrumb-item"><a href="{{url('admin/user')}}">Beranda</a></li>
          <li class="breadcrumb-item active">{{ $pageTitle }}</li>
        </ol>
      </div><!-- /.col -->

    </div><!-- /.row -->

    <div class="row">
      <div class="col-sm-12">
        @include('shared.v_msgbox', ['errors'=>$errors])
      </div>
    </div>
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">    
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{ url('uploads/user/'.$dtUser->picture) }}" alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{$dtUser->name}}</h3>
                <p class="text-muted text-center">{{$dtUser->role_id}}</p>
                <a href="#" class="btn btn-primary btn-block"><b><i class="fa fa-undo"></i>&nbsp;Reset Password</b></a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->

        <!-- // -->
        <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#about-user" data-toggle="tab"><i class="fa fa-user"></i> Tentang Pengguna</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab"><i class="fa fa-cog"></i> Setting</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="about-user">
                    <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i> Nama</strong>
                        <p>{{$dtUser->name}}</p>
                        <hr>
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat Email</strong>
                        <p>{{$dtUser->email}}</p>
                        <hr>
                        <strong><i class="fas fa-pencil-alt mr-1"></i> Tanggal join</strong>
                        <p>{{$dtUser->created_at}}</p>
                        <hr>
                        <strong><i class="far fa-file-alt mr-1"></i> Status</strong>
                        <p>{{$dtUser->status}}</p>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="status" placeholder="Status">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="jabatan" placeholder="Jabatan">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-save"></i>&nbsp;Simpan</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

        <!-- // -->

      </div>
  </div>
</section>


@endsection
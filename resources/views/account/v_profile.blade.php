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
                  @if($dtUser->picture != null)
                  <img class="profile-user-img img-fluid img-circle mb-3" src="{{ url('uploads/user/'.$dtUser->picture) }}" alt="User profile picture">
                  <p><a href="#" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete-picture-modal"><i class="fa fa-times"></i> Hapus & Ganti Gambar</a></p>
                  @else
                  <form action="{{ url('account/upload-picture/'.$dtUser->id) }}" method="POST" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
                  <div class="form-group">
                    <img class="profile-user-img img-fluid img-circle mb-3" src="{{ url('images/noimage.jpg') }}" alt="Gambar">
                    <p>Gambar tidak ada. Silahkan upload!!</p>
                    <label><strong>Upload Gambar</strong></label>
                    <div class="custom-file">
                      <input type="file" id="foto" name="foto" multiple class="custom-file-input form-control" accept="image/png, image/jpeg, image/jpg">
                      <label class="custom-file-label" for="foto">Pilih Gambar</label>
                    </div>
                  </div>
                  <button type="submit" name="Upload" class="btn btn-sm btn-info btn-block">Upload</button>
                  </form>
                  @endif
                  
                </div>
                <hr>
                <h3 class="profile-username text-center">{{$dtUser->name}}</h3>
                <p class="text-muted text-center">Role: {{$dtUser->role_id}}</p>
                
                <a href="{{url('account/changepass')}}" class="btn btn-primary btn-block"><b><i class="fa fa-key"></i>&nbsp;Ganti Password</b></a>
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
                  <li class="nav-item"><a class="nav-link active" href="#about-me" data-toggle="tab"><i class="fa fa-user"></i> Tentang Saya</a></li>
                  <li class="nav-item"><a class="nav-link" href="#edit-data" data-toggle="tab"><i class="fa fa-edit"></i> Rubah Data</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="about-me">
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

                  <div class="tab-pane" id="edit-data">
                    <form class="form-horizontal myform" action="{{url('account/update/'.$dtUser->id)}}" method="POST">
                    @csrf
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="name" name="name" value="{{$dtUser->name}}" placeholder="Nama">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="email" name="email" value="{{$dtUser->email}}" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <!-- <button type="submit" class="btn btn-sm btn-warning confirmation" data-flag="0" data-action="update"><i class="fa fa-save"></i>&nbsp;Simpan</button> -->
                          <button type="submit" class="btn btn-sm btn-warning confirmBeforePost"><i class="fa fa-save"></i>&nbsp;Simpan</button>
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

<!-- DELETE PICTURE -->
<!-- ===================================================== -->
<div class="modal fade" id="delete-picture-modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><i class="fa fa-trash"></i> Hapus Gambar</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin ?</p>
          <p>Anda akan menghapus gambar. Setelah di eksekusi, proses ini tidak dapat dibatalkan. Apakah Anda benar-benar ingin melakukan nya?</p> 
        </div>
        <div class="modal-footer justify-content-between">
          <form action="{{ url('account/delete-picture', [$dtUser->id]) }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-check"></i>&nbsp;Ya, Hapus gambar!</button>
          </form>
          <button class="btn btn-sm btn-default" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Batal</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


@endsection
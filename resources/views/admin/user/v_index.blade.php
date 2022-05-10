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
  	  <div class="col-12">
  	  	<div class="card card-primary card-outline">
          <div class="card-header">
            <!-- ONLY WEBMASTER CAN ADD DATA -->
            @if($loggedinInfo->role_id == 99)
            <a href="{{ url('/admin/user/create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
            @endif
            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Cari..">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
  	  		<div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Foto</th>
                    <th>User ID</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                	<?php $no = 1; ?>
                	@foreach($dtUser as $row)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>
                      @if(!empty($row->picture))
                      <img class="profile-user-img img-fluid img-circle" src="{{ url('uploads/user/'.$row->picture) }}" alt="Foto">
                      @else
                      <img class="profile-user-img img-fluid img-circle" src="{{ url('images/noimage.jpg') }}" alt="Foto">
                      @endif
                    </td>
                    <td>{{$row->username}}</td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->role_id}}</td>
                    <td>
                      @if($row->status == 'Active')
                        <a class="updateStatusUser" id="user-{{$row->id}}" user_id="{{ $row->id }}" href="javascript:void(0)">Active</a>
                      @else
                        <a class="updateStatusUser" id="user-{{$row->id}}" user_id="{{ $row->id }}" href="javascript:void(0)">Inactive</a>
                      @endif
                    </td>
                    <td>
                      <a href="{{ url('/admin/user/'.$row->id) }}" class="btn btn-sm btn-info"><i class="fa fa-search"></i>&nbsp;Detail</a>
                      <!-- <a href="{{ url('/admin/user/'.$row->id.'/edit') }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp;Edit</a> -->
                      <!-- <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{$row->id}}"><i class="fa fa-trash"></i>&nbsp;Delete</button> -->
                      <!-- <a href="javascript:void(0)" class="btn btn-sm btn-warning confirmDelete" record="user" record_id="{{$row->id}}"><i class="fa fa-edit"></i>&nbsp;Hapus</a> -->
                    </td>
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
  	      </div>
  	    </div><!-- /.card -->
  	
  	  </div>
  	</div>
  </div>
</section>

<!-- MODAL-DELETE -->
@foreach($dtUser as $dt)
<div class="modal fade" id="modal-delete-{{$dt->id}}">
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
        <form action="{{ url('admin/user', [$dt->id]) }}" method="POST">
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
@endforeach

@push('scripts')
  <script src="{{url('js/mhz_script.js')}}"></script>
@endpush

@endsection
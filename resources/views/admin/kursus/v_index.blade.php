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
          <li class="breadcrumb-item"><a href="{{url('admin/kursus')}}">Beranda</a></li>
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
            @if($loggedinInfo->role_id != 1)
            <a href="{{ url('/admin/kursus/create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
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
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Pemateri</th>
                    <th>Kategori</th>
                    <th>Harga (Juta Rp.)</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                	<?php $no = 1; ?>
                	@foreach($dtKursus as $row)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>
                      @if(!empty($row->picture))
                      <img class="profile-user-img img-fluid" src="{{ url('uploads/kursus/'.$row->picture) }}" alt="Gambar Kursus">
                      @else
                      <img class="profile-user-img img-fluid" src="{{ url('images/noimage.jpg') }}" alt="Gambar Kursus">
                      @endif
                    </td>
                    <td>{{$row->title}}</td>
                    <td>{{$row->trainers->name}}</td>
                    <td>{{$row->category}}</td>
                    <td>{{$row->price}}</td>
                    <td>
                      <a href="{{ url('/admin/kursus/'.$row->id) }}" class="btn btn-sm btn-info"><i class="fa fa-search"></i>&nbsp;Detail</a>
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

@endsection
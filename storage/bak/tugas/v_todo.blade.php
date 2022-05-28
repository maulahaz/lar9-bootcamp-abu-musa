@extends('templates/adminlte/index')
@section('content')
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
    {{-- Notification --}}
    <div class="row">
      <div class="col-sm-12">
        @include('shared.msgbox', ['errors'=>$errors])
      </div>
    </div>
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
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Data {{$pageTitle}}</h3>
          </div>
          <div class="card-body p-0">
            <table class="table table-sm">
              <thead class=" text-primary">
                <th>No.</th>
                <th>Title</th>
                <th>Status</th>
                <th>Action</th>
              </thead>
              <tbody>
                @if(count($dtTugas) > 0)
                @foreach($dtTugas as $row)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td class="text-left">{{ $row->title }}</td>
                  <td>{{ $row->status }}</td>
                  <td>                   
                    <a href="{{ url('tugas/execution', $row->tgId) }}" class="btn btn-warning btn-sm"><i class="fa fa-search"></i></a>
                  </td>
                </tr>
                @endforeach
                @else
                <tr>
                  <td colspan="4">Data not available</td>
                </tr>
                @endif
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
@endsection
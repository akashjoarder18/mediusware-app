@extends('main-layout')

@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Users</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Users</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection
@section('body')
    <!-- Main row -->
    <div class="row">
    	<div class="container-fluid">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users Details</h3>
                <a href="{{route('users.register')}}">
                  <button class="btn btn-primary d-inline-block m-2 float-right"> Add </button>
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <!--<th style="width: 10px">#</th>-->
                      <th>Name</th>
                      <th>Email</th>
                      <th>account_type</th>
                      <th>Balance</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($user as $info)
                    <tr>
                      <!--<td>1.</td>-->
                      <td>{{$info->name}}</td>
                      <td>{{$info->email}}</td>
                      
                      <td>
                          @if($info->account_type == "Individual")
                          Individual
                          @elseif($info->account_type == "Business")
                          Individual
                          @endif
                      </td>
                      <td>{{$info->balance}}</td>
                      
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <div class="d-flex">
                  
                </div>
                </ul>
              </div>
            </div>
    	</div>
    	
    </div>
    <!-- /.row (main row) -->
@endsection
@extends('main-layout')

@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">User banking deposit transections</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Deposit Transections</li>
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
                <h3 class="card-title">Users Banking Deposit Transections</h3>
                <a href="{{route('users.index', ['id' => auth()->user()->id])}}"><span class="ml-5"> {{auth()->user()->name}} </span>
                </a>
                <a href="{{route('get.deposit')}}">
                  <button class="btn btn-primary d-inline-block m-2 float-right"> Deposit Add </button>
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <!--<th style="width: 10px">#</th>-->
                      <th>Transection</th>
                      <th>Amount</th>
                      <th>Date</th>
                      <th>fee</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($transection as $item)
                    <tr>
                      <!--<td>1.</td>-->
                      <td>{{$item->transection_type}}</td>
                      <td>{{$item->amount}}</td>
                      <td>{{date('Y-m-d',strtotime($item->date))}}</td>
                      <td>{{$item->fee}}</td>
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
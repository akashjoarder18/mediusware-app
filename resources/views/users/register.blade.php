<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Banking | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin-assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('admin-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin-assets/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition">
<!-- Main row -->
<div class="row">
  <div class="container">
  <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">{{$title}}</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{route('users.store')}}" method="post">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{old('name',$user->name ?? '')}}">
                <span class="text-danger">
                  @error('name')
                  {{$message}}
                  @enderror
                </span>
              </div>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{old('email',$user->email ?? '')}}">
                <span class="text-danger">
                  @error('email')
                  {{$message}}
                  @enderror
                </span>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <span class="text-danger">
                  @error('password')
                  {{$message}}
                  @enderror
                </span>
              </div>
              <div class="form-group">
                <label for="">User Transection Type</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" value="Individual" name="account_type"
                      @isset($user) {{$user->account_type == "Individual" ? "checked" : ""}} @endisset />
                      <label class="form-check-label">Individual</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" value="Business" name="account_type" @isset($user) {{$user->account_type == "Business" ? "checked" : ""}} @endisset />
                      <label class="form-check-label">Business</label>
                    </div>
                    <span class="text-danger">
                      @error('account_type')
                      {{$message}}
                      @enderror
                    </span>
              </div>
              <div class="form-group">
                <label for="balance">Amount Balance</label>
                <input type="text" class="form-control" id="balance" name="balance" placeholder="Enter amount balance" value="{{old('balance',$user->balance ?? '')}}">
                <span class="text-danger">
                  @error('balance')
                  {{$message}}
                  @enderror
                </span>
              </div>                               
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
  
</div>
<!-- /.row (main row) -->

<!-- jQuery -->
<script src="{{asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin-assets/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
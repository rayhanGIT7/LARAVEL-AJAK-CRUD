@extends('layouts.admin')

@section('admin_content')

<div class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Admin Palan Login</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ route('login') }}" method="post">
      	
      	  @csrf
        <div class="input-group mb-3">

         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Your Email">

        
                          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
                 @error('email')
               <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
 

        <div class="input-group mb-3">

           <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter Your password">

            @error('password')
           
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
            <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
          </form>
          <!-- /.col -->
        

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
   
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>

</div>

@endsection
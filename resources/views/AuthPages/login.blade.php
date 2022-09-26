@extends('AuthLayout.main')
@section('main-content')
<div class="container mt-3">

    <form action="login" method="POST" class="card p-4 mt-4 w-50 mx-auto shadow">
        @csrf 
        @if(isset(Auth::user()->email))
            <script>window.location= "dashboard"</script>
        @endif
        @if(Session::get('user'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('user')}} 
            <button type="button" onclick="@php Session::flush('registerUser','User Create Successfully'); @endphp" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if(count($errors)>0)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" onclick="@php Session::flush('registerUser','User Create Successfully'); @endphp" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
          </div>
        @endif
        <h2 class="text-center">Login Page</h2> 
        <div class="mb-3">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" name="email" class="form-control form-control-sm" placeholder="Enter Email Address" id="email"> 
        </div>
       
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control form-control-sm" placeholder="Enter Password" id="password">
        </div>
        <button type="submit" class="btn btn-primary w-75 mx-auto">Login</button>
        <p class="text-center mt-3">Need an Account? <a href="register" class="text-decoration-none">Sign Up</a> </p>
      </form>
</div>

@endsection
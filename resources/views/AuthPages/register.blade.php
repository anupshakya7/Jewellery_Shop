@extends('AuthLayout.main')
@section('main-content')
<div class="container">
    <form action="register" method="POST" class="card p-4 mt-4 w-50 mx-auto shadow">
        <h2 class="text-center">Register Page</h2>
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control form-control-sm" placeholder="Enter Full Name" id="name">
          </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" name="email" class="form-control form-control-sm" placeholder="Enter Email Address" id="email"> 
        </div>
        <div class="mb-3">
            <label for="mobile" class="form-label">Mobile No</label>
            <input type="text" name="mobile" class="form-control form-control-sm" placeholder="Enter Mobile Number" id="mobile">
          </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control form-control-sm" placeholder="Enter Password" id="password">
        </div>
        <button type="submit" class="btn btn-primary w-75 mx-auto">Register</button>
        <p class="text-center mt-3">Already have an Account? <a href="login" class="text-decoration-none">Sign In</a> </p>
    </form>
</div>
@endsection
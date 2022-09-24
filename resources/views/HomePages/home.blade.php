@extends('HomeLayout.main')
@section('main-content')

@if(Session::get('loginUser'))
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="dashboard">Home Page</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0">
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{Session::get('loginUser')->name}}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="logout">Logout</a></li>
            </ul>
          </li>
        </ul>
        
      </div>
    </div>
  </nav>
@endif
    <div class="container">

        <div class="cont">
            <img src="{{url('frontend/img/gold.jpeg')}}">
            <h5>Gold</h5>
            <a href="gold" class="btn btn-primary btn-sm">View All</a>
        </div>
        <div class="cont">
            <img src="{{url('frontend/img/silver.jpg')}}">
            <h5>Silver</h5>
            <a href="silver" class="btn btn-primary btn-sm">View All</a>
        </div>
        <div class="cont">
            <img src="{{url('frontend/img/calc.jpg')}}">
            <h5>Calculator</h5>
            <a href="calculate" class="btn btn-primary btn-sm">View All</a>
        </div>
    </div>

    @endsection
@extends('HomeLayout.main')
@section('main-content')
<h4>Home Page</h4>
@if(Session::get('loginUser'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    Welcome , {{Session::get('loginUser')->name}} 
    <button type="button" onclick="" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
    <div class="container">

        <div class="cont">
            <img src="{{url('frontend/img/gold.jpeg')}}">
            <p>Gold</p>
            <button>View All</button>
        </div>
        <div class="cont">
            <img src="{{url('frontend/img/silver.jpg')}}">
            <p>Silver</p>
            <button>View All</button>
        </div>
        <div class="cont">
            <img src="{{url('frontend/img/calc.jpg')}}">
            <p>Calculator</p>
            <button>View All</button>
        </div>
    </div>

    @endsection
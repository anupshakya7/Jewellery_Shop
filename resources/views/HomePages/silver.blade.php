@extends('HomeLayout.main')
@section('main-content')
<h4>Silver Items</h4>
<input type="text" required class="search" placeholder="Search">
<button>Search</button>
<button id="add">Add</button>
<div class="table">
    <table class="center">
        <tr>
        <th>Item Code</th>
        <th>Item Name</th>
        <th>Tola</th>
        <th>Action</th>
        </tr>
        @foreach ($silver as $silvers)
        <tr>
            <td>{{$silvers->item_code}}</td>
            <td>{{$silvers->item_name}}</td>
            <td>{{$silvers->item_tola}}</td>
            <td><button>Edit</button>
            <button id="del">Delete</button> </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
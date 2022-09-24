@extends('HomeLayout.main')
@section('main-content')
<h4>Gold Items</h4>
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
        @foreach ($gold as $golds)
        <tr>
            <td>{{$golds->item_code}}</td>
            <td>{{$golds->item_name}}</td>
            <td>{{$golds->item_tola}}</td>
            <td><button>Edit</button>
            <button id="del">Delete</button> </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
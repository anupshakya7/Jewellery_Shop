@extends('HomeLayout.main')
@section('main-content')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Gold Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
    <form action="{{url('add-gold-item')}}" method="POST">
        <div class="modal-body">
            @csrf
            <div class="form-group mb-3">
                <label for="">Item Code</label>
                <input type="text" name="item_code" required placeholder="Enter Item Code" id="item_code" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Item Name</label>
                <input type="text" name="item_name" required placeholder="Enter Item Name" id="item_name" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Tola</label>
                <input type="text" name="item_tola" required placeholder="Enter Tola" id="item_tola" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" onclick="clearAll()">Add</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  {{-- End Modal --}}
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
               <div class="alert alert-success">{{session('status')}}</div> 
            @endif
            <div class="card shadow">
                <div class="card-header bg-white p-3">
                    <h4>
                        Gold Data
                        <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Gold Item</button>
                    </h4>   
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-11">
                            <input type="text" name="search" placeholder="Search Item..." id="item_search" class="form-control">
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-primary btn-sm mt-1">Search</button>
                        </div>
                       
                       
                    </div>
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Item Code</th>
                                <th>Item Name</th>
                                <th>Tola</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gold as $key => $golds)
                            <tr>
                                <td>{{$golds->item_code}}</td>
                                <td>{{$golds->item_name}}</td>
                                <td>{{$golds->item_tola}}</td>
                                <td>
                                    <button type="button" value="{{$golds->id}}" class="btn btn-primary editbtn btn-sm">Edit</button>
                                    <a href="" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var itemCode = document.getElementById('item_code');
    var itemName = document.getElementById('item_name');
    var itemTola = document.getElementById('item_tola');


    function clearAll(){
        this.itemCode = "";
        this.itemName = "";
        this.itemTola = "";
    }
</script>
@endsection
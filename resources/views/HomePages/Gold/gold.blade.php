@extends('HomeLayout.main')
@section('main-content')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Gold Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
    <form id="AddGoldForm" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <ul class="alert alert-warning d-none" id="save_errorList"></ul>
            <div class="row">
                <div class="form-group mb-3 col-sm-6">
                    <label for="">Item Code</label>
                    <input type="text" name="item_code" placeholder="Enter Item Code" class="form-control">
                </div>
                <div class="form-group mb-3 col-sm-6">
                    <label for="">Item Name</label>
                    <input type="text" name="item_name" placeholder="Enter Item Name" class="form-control">
                </div>
                <div class="form-group mb-3 col-sm-6">
                    <label for="">Gram</label>
                    <input type="text" name="item_gram" placeholder="Enter Gram" class="form-control">
                </div>
                <div class="form-group mb-3 col-sm-6">
                    <label for="">Making Charge</label>
                    <input type="text" name="item_making_charge" placeholder="Enter Making Charge" class="form-control">
                </div>
                <div class="form-group mb-3 col-sm-6">
                    <label for="">Wastages</label>
                    <input type="text" name="item_wastages" placeholder="Enter Wastages" class="form-control">
                </div>
                <div class="form-group mb-3 col-sm-6">
                    <label for="">Stone Charge</label>
                    <input type="text" name="item_stone_charge" placeholder="Enter Stone Charge" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="file" class="form-label">Choose File</label>
                    <input type="file" name="item_images" class="form-control" id="file">  
                </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
      </div>
    </div>
</div>
<!--End Modal-->

<!--Edit Modal-->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit & Update Gold Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
    <form id="UpdateGoldForm" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <input type="hidden" name="gold_id" id="gold_id">
            <ul class="alert alert-warning d-none" id="update_errorList"></ul>
            <div class="row">
                <div class="form-group mb-3 col-sm-6">
                    <label for="">Item Code</label>
                    <input type="text" id="item_code" name="item_code" placeholder="Enter Item Code" class="form-control">
                </div>
                <div class="form-group mb-3 col-sm-6">
                    <label for="">Item Name</label>
                    <input type="text" id="item_name" name="item_name" placeholder="Enter Item Name" class="form-control">
                </div>
                <div class="form-group mb-3 col-sm-6">
                    <label for="">Gram</label>
                    <input type="text" id="item_gram" name="item_gram" placeholder="Enter Gram" class="form-control">
                </div>
                <div class="form-group mb-3 col-sm-6">
                    <label for="">Making Charge</label>
                    <input type="text" id="item_making_charge" name="item_making_charge" placeholder="Enter Making Charge" class="form-control">
                </div>
                <div class="form-group mb-3 col-sm-6">
                    <label for="">Wastages</label>
                    <input type="text" id="item_wastages" name="item_wastages" placeholder="Enter Wastages" class="form-control">
                </div>
                <div class="form-group mb-3 col-sm-6">
                    <label for="">Stone Charge</label>
                    <input type="text" id="item_stone_charge" name="item_stone_charge" placeholder="Enter Stone Charge" class="form-control">
                </div>
    
                <div class="form-group mb-3">
                        <label for="file" class="form-label">Choose File</label>
                        <input type="file" id="item_images" name="item_images" class="form-control">
                </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
      </div>
    </div>
</div>
<!--End Edit Modal-->

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Gold Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @csrf
          <h4>Are you sure? You want to delete this data?</h4>
          <input type="hidden" id="deleting_gold_id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="button" class="delete_modal_btn btn btn-primary">Yes Delete</button>
        </div>
    </form>
      </div>
    </div>
</div>
<!--End Delete Modal-->

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <a href="/dashboard" class="btn btn-danger btn-sm float-end "><- Back</a>
            <a href="/dashboard" id="reloadBtn" class="btn btn-danger btn-sm float-end me-2">Reload</a>
        </div>
        <div class="col-md-12 mt-2">
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
                    <form id="searchGoldForm" method="GET" class="row mb-3">
                        <div class="col-sm-11">
                            <input type="search" name="search" placeholder="Search Item..." id="item_search" class="form-control">
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-primary btn-sm mt-1" id="searchBtn" type="submit">Search</button>
                        </div>
                    </form>  
                    
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Item Code</th>
                                <th>Item Image</th>
                                <th>Item Name</th>
                                <th>Tola</th>
                                <th>Details</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
<style>
    .pagination{
        justify-content: center !important;
    }
</style>
@endsection

@section('scripts')
<script>
    var itemCode = document.getElementById('item_code');
    var itemName = document.getElementById('item_name');
    var itemTola = document.getElementById('item_tola');
    var itemImages = document.getElementById('item_images');


    function clearAll(){
        this.itemCode = "";
        this.itemName = "";
        this.itemTola = "";
        this.itemImages = "";
    }

    $(document).ready(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        fetchGold();
        function fetchGold(){
            $.ajax({
                type:'GET',
                url:'fetch-gold',
                dataType:'json',
                success:function(response){
                    $('tbody').html("");
                    $.each(response.gold_item,function(key,item){
                        $('tbody').append('<tr>\
                                <td>'+item.item_code+'</td>\
                                <td><img src="uploads/gold/'+item.item_images+'" alt="Image" width="100" height="90"></td>\
                                <td style="width:450px">'+item.item_name+'</td>\
                                <td>'+item.item_gram+' g</td>\
                                <td>\
                                    <button type="button" value="'+item.id+'" class="viewDetail btn btn-secondary btn-sm">View Details</button>\
                                </td>\
                                <td>\
                                    <button type="button" value="'+item.id+'" class="editbtn btn btn-success btn-sm">Edit</button>\
                                    <button type="button" value="'+item.id+'" class="deleteBtn btn btn-danger btn-sm">Delete</button>\
                                </td>\
                            </tr>')
                    });
                }
            });
        }

        function searchFetchGold(){
            let searchItem = $('#item_search').val();
            $.ajax({
                type:'GET',
                url:'search-gold',
                data:{search: searchItem},
                dataType:'json',
                success:function(response){
                    if(response.status == 404){
                        alert(response.message);
                    }else if(response.status == 200){
                        $('tbody').html("");
                        $.each(response.gold_item,function(key,item){
                        $('tbody').append('<tr>\
                                <td>'+item.item_code+'</td>\
                                <td><img src="uploads/gold/'+item.item_images+'" alt="Image" width="100" height="90"></td>\
                                <td style="width:450px">'+item.item_name+'</td>\
                                <td>'+item.item_gram+' g</td>\
                                <td>\
                                    <button type="button" value="'+item.id+'" class="viewDetail btn btn-secondary btn-sm">View Details</button>\
                                </td>\
                                <td>\
                                    <button type="button" value="'+item.id+'" class="editbtn btn btn-success btn-sm">Edit</button>\
                                    <button type="button" value="'+item.id+'" class="deleteBtn btn btn-danger btn-sm">Delete</button>\
                                </td>\
                            </tr>')
                    });
                    }
                }
            });
        }

        $(document).on('click','#reloadBtn',function(e){
            e.preventDefault();
            fetchGold();
            $('#item_search').val('');
        })

        $(document).on('submit','#searchGoldForm',function(e){
            e.preventDefault();
            searchFetchGold();
        });

        $(document).on('submit','#AddGoldForm',function(e){
            e.preventDefault();
            let formData = new FormData($('#AddGoldForm')[0]);
            $.ajax({
                type:'POST',
                url:'add-gold',
                data:formData,
                contentType:false,
                processData:false,
                success:function(response){
                    if(response.status == 400){
                        $('#save_errorList').html("");
                        $('#save_errorList').removeClass('d-none');
                        $.each(response.errors,function(key,err_value){
                            $('#save_errorList').append('<li>'+err_value+'</li>');
                        })
                    }else if(response.status == 200){
                        $('#save_errorList').html('');
                        $('#save_errorList').addClass('d-none');
                        $('#item_search').val('');
                        
                        //this.reset();
                        $('#AddGoldForm').find('input').val('');
                        $('#exampleModal').modal('hide');
                        alert(response.message);
                        fetchGold();
                    }
                }
            });
        });

        $(document).on('click','.editbtn',function(e){
            e.preventDefault();
            var gold_id = $(this).val();
            $('#editModal').modal('show');

            $.ajax({
                type:'GET',
                url:'edit-gold/'+gold_id,
                success:function(response){
                    if(response.status == 404){
                        alert(response.message);
                        $('#editModal').modal('hide');
                    }else{
                        $('#item_code').val(response.gold.item_code);
                        $('#item_name').val(response.gold.item_name);
                        $('#item_gram').val(response.gold.item_gram);
                        $('#item_making_charge').val(response.gold.item_making_charge);
                        $('#item_wastages').val(response.gold.item_wastages);
                        $('#item_stone_charge').val(response.gold.item_stone);
                        $('#item_images').val(null);
                        $('#gold_id').val(gold_id);
                    }
                }
            })
        });

        $(document).on('submit','#UpdateGoldForm',function(e){
            e.preventDefault();
            var id = $('#gold_id').val();
            let EditGoldFormData = new FormData($('#UpdateGoldForm')[0]);

            $.ajax({
                type:'POST',
                url:'update-gold/'+id,
                data:EditGoldFormData,
                contentType:false,
                processData:false,
                success:function(response){
                    if(response.status == 400){
                        $('#update_errorList').html('');
                        $('#update_errorList').removeClass('d-none');
                        $.each(response.errors, function(key,err_value){
                            $('#update_errorList').append('<li>'+err_value+'</li>')
                        });
                    }else if(response.status == 404){
                        alert(response.message);
                    }else if(response.status == 200){
                        $('#update_errorList').html('');
                        $('#update_errorList').addClass('d-none');

                        $('#editModal').modal('hide');
                        alert(response.message);
                        searchFetchGold();
                    }
                }
            });
        });

        $(document).on('click','.deleteBtn',function(e){
            e.preventDefault();
            var gold_id = $(this).val();
            $('#deleteModal').modal('show');
            $('#deleting_gold_id').val(gold_id);
        });

        $(document).on('click','.delete_modal_btn',function(e){
            e.preventDefault();
            var id = $('#deleting_gold_id').val();
            $.ajax({
                type:'DELETE',
                url:'delete-gold/'+id,
                data:{
                    _token:'{!! csrf_token() !!}'
                },
                dataType:'json',
                success: function(response){
                    if(response.status == 404){
                        alert(response.message);
                        $('#deleteModal').modal('hide');
                    }else if(response.status == 200){
                        searchFetchGold();
                        $('#deleteModal').modal('hide');
                        alert(response.message)
                    }
                }
            })
        });
    });
</script>
@endsection
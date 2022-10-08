@extends('HomeLayout.main')
@section('main-content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <a href="/dashboard" class="btn btn-sm btn-danger float-end"><- Back</a>
        </div>
        <div class="col-md-12 mt-2">
            <div class="card shadow">
                <div class="card-header bg-white p-3">
                    <h4 id="calculator_heading">
                        Calculate Item Price 
                    </h4>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-secondary dropdown-toggle float-end" style="width: 130px;" id="dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="true">
                          Choose Type
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" style="cursor: pointer;" onclick="getData('gold')">Gold</a></li>
                          <li><a class="dropdown-item" style="cursor: pointer;" onclick="getData('silver')">Silver</a></li>
                        </ul>
                      </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-11">
                            <input type="search" placeholder="Search Item..." id="item_search" class="form-control">
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-primary btn-sm mt-1" onclick="search()">Search</button>
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
                        <tbody id="tableData">
                           
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
    var dataTable = document.getElementById('tableData');
    var heading = document.getElementById('calculator_heading');
    var dropdown = document.getElementById('dropdown');
    
    //This is not ready
    function search(){
            var searchText = document.getElementById('item_search').value;
            var req = new XMLHttpRequest();
            req.open("GET","search-calculate/"+searchText,true);
            req.send();
            req.onreadystatechange = function(){
                if(req.readyState == 4 && req.status == 200){
                    var obj = JSON.parse(req.responseText);
                    heading.innerHTML ="Calculate Gold Price";
                    dropdown.innerHTML = 'Gold';
                    dataTable.innerHTML = "";
                    for(let i=0;i<obj.gold_search.length;i++){
                        dataTable.innerHTML += `<tr>
                                    <td>`+obj.gold_search[i].item_code+`</td>
                                    <td>`+obj.gold_search[i].item_name+`</td>
                                    <td>`+obj.gold_search[i].item_tola+`</td>
                                    <td> <a href="{{url('calculator/`+obj.gold_search[i].id+`')}}" class="btn btn-danger btn-sm">Calculate</a></td>
                                </tr>`
                    }
                    
                }
            }
        }
    //This is not ready

    function getData(type){
        if(type == "gold"){
           
            var req = new XMLHttpRequest();
            req.open("GET","gold-calculate",true);
            req.send();

            req.onreadystatechange = function(){
                if(req.readyState == 4 && req.status == 200){
                    var obj = JSON.parse(req.responseText);
                    dropdown.innerHTML = 'Gold';
                    heading.innerHTML ="Calculate Gold Price";
                    dataTable.innerHTML = "";
                    for(let i=0; i< obj.gold.length;i++){
                        dataTable.innerHTML += `<tr>
                                <td>`+obj.gold[i].item_code+`</td>
                                <td>`+obj.gold[i].item_name+`</td>
                                <td>`+obj.gold[i].item_tola+`</td>
                                <td> <a href="{{url('calculator/`+obj.gold[i].id+`')}}" class="btn btn-danger btn-sm">Calculate</a></td>
                            </tr>`
                    }
                }
            }
        }else if(type == "silver"){
           
            var req = new XMLHttpRequest();
            req.open("GET","silver-calculate",true);
            req.send();

            req.onreadystatechange = function(){
                if(req.readyState == 4 && req.status==200){
                    var obj = JSON.parse(req.responseText);
                    dropdown.innerHTML = 'Silver';
                    heading.innerHTML ="Calculate Silver Price";
                    dataTable.innerHTML = "";
                    for(let i=0; i<obj.silver.length;i++){
                        dataTable.innerHTML += `<tr>
                            <td>`+obj.silver[i].item_code+`</td>
                            <td>`+obj.silver[i].item_name+`</td>
                            <td>`+obj.silver[i].item_tola+`</td>
                            <td><a href="{{url('calculators/`+obj.silver[i].id+`')}}" class="btn btn-danger btn-sm">Calculate</a></td>
                        </tr>`
                    }
                }
            }
        }
    }
</script>
@endsection
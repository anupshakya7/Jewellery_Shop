@extends('HomeLayout.main')
@section('main-content')
    <div class="container mt-3">
        <div class="card m-auto w-50 p-3">
            <h3>Final Calculation For {{$calculatorItem->item_name}}</h3>
            <div class="row mt-2">
                <div class="col-sm-12">
                    <div>
                        <label for="item_code">Item Code</label>
                    <input type="text" id="item_code" class="form-control" value="{{$calculatorItem->item_code}}" name="item_code" disabled>
                    </div>
                    <div class="mt-2">
                        <label for="item_code">Item Name</label>
                        <input type="text" id="item_name" class="form-control" value="{{$calculatorItem->item_name}}" name="item_name" disabled>
                    </div>
                </div>
                <div class="col-sm-6 mt-2">
                    <label for="item_tola">Item Tola</label>
                    <input type="text" id="item_tola" class="form-control" value="{{$calculatorItem->item_tola}}" name="item_tola" disabled>
                </div>
                <div class="col-sm-6 mt-2">
                    <label for="item_quantity">Item Quantity</label>
                    <input type="number" id="item_quantity" class="form-control" name="item_quantity">
                </div>
                <div class="col-sm-6 mt-2">
                    <label for="npr_tola">NPR/Tola</label>
                    <input type="number" id="npr_tola" class="form-control" name="npr_tola">
                </div>

                <button class="btn btn-danger mt-4" onclick="calculateBtn()">Calculate</button>

                <hr class="mt-4">

                <div class="col-sm-6">
                    <h5 class="text-center">Status</h5>
                    <p>Total Price Without VAT and Discount: </p>
                    <p>Total Price with Discount: </p>
                </div>
                <div class="col-sm-6">
                    <h5 class="text-center">Price</h5>
                    <p class="text-center">Rs. <span id="priceWithoutVATandDiscount"></span></p>
                    <p class="text-center">Rs. <span id="priceWithDiscount"></span></p>
                </div>
                <hr>
                <div class="col-sm-6">
                    <h5>Grand Total Price with VAT: </h5>
                </div>
                <div class="col-sm-6">
                    <h5 class="text-center">Rs. <span id="grandTotal"></span></h5>
                </div>
            </div>
            
        </div>
    </div>
@endsection

@section('scripts')
    <script>


        function calculateBtn(){
            var item_code = document.getElementById('item_code').value;
            var item_name = document.getElementById('item_name').value;
            var item_tola = document.getElementById('item_tola').value;
            var item_quantity = document.getElementById('item_quantity').value;
            var npr_tola = document.getElementById('npr_tola').value;
            var priceWithoutVATandDiscount = document.getElementById('priceWithoutVATandDiscount');
            var priceWithDiscount = document.getElementById('priceWithDiscount');
            var TotalPrice = document.getElementById('grandTotal');

            let nf = new Intl.NumberFormat('en-US');

            //For Total Price Without VAT and Discount
            var totalPriceWithoutVatandDiscount= (item_tola * npr_tola)*item_quantity;
            priceWithoutVATandDiscount.innerText = nf.format(totalPriceWithoutVatandDiscount);

            //For Total Price with Discount
            var totalPriceWithDiscount = totalPriceWithoutVatandDiscount-(totalPriceWithoutVatandDiscount*5)/100;
            priceWithDiscount.innerText = nf.format(totalPriceWithDiscount);

            //For Grand Total Price
            var grandTotalPrice = totalPriceWithDiscount+(totalPriceWithDiscount*13)/100;
            TotalPrice.innerText = nf.format(grandTotalPrice);
            
        }
    </script>
@endsection

@extends('layouts.backend-layout')

@section('title')
    Edit Inventory
@endsection

@section('breadcrumb')
    Edit Inventory
@endsection

@section('content')
    <form method="post" action="{{route('updateInventory',['id'=>$inventoryData->inventory_id])}}" enctype="multipart/form-data" class="needs-validation" onload="multiplyBy()"
          novalidate autocomplete="off">
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                <strong>Success - </strong> {{session('success')}}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        <div class="mb-3">
            <label class="form-label" for="validationCustom01">Inventory Title</label>
            <input type="text" class="form-control" id="validationCustom01" placeholder="Enter inventory title"
                   name="inventory_title" value="{{$inventoryData->inventory_title}}" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter inventory title.
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="validationCustom01">Inventory Quantity</label>
            <input type="number" class="form-control" id="inv_quantity" onchange="multiplyBy()" placeholder="Enter inventory quantity"
                   name="inventory_quantity" value="{{$inventoryData->inventory_quantity}}" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter quantity.
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="validationCustom02">Unit Price </label>
            <input type="number" class="form-control" id="u_price" onchange="multiplyBy()" placeholder="Enter unit price"
                   name="inventory_unit_price" value="{{$inventoryData->inventory_unit_price}}" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter unit price.
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="validationCustom03">Description</label>
            <input type="text" class="form-control" id="validationCustom03" placeholder="Enter Description"
                   name="inventory_description" value="{{$inventoryData->inventory_description}}" required>

            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter description.
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Amount </label>
            <input name="inventory_amount" id="inventory_amount"  value="{{$inventoryData->inventory_amount}}" class="form-control" readonly>


        </div>
        <button class="btn btn-primary" type="submit" >Update  inventory</button>
    </form>


    <script>

        function multiplyBy() {
            // js for multiply two inputs and store into third input


            qty = document.getElementById("inv_quantity").value;
            price = document.getElementById("u_price").value;
            document.getElementById("inventory_amount").value = qty * price;;
        }

    </script>

@endsection

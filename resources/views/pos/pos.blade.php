@extends('layouts.app')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12 bg-info ">
                    <h4 class="pull-left page-title text-white">POS (Point of Sale)</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#" class="text-white">Inventory Management System</a></li>
                        <li class="text-white">{{ date('d.m.Y') }}</li>
                    </ol>
                </div>
            </div>
            </br>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 ">
                    <div class="portfolioFilter">
                        @foreach($category as $row)
                        <a href="#" data-filter="*" class="current">{{ $row->catName }}</a>  
                        @endforeach                 
                    </div>
                </div>
            </div>
            </br>
            <div class="row">
                <div class="col-lg-6">
                        
                        <div class="price_card text-center">
                            
                            <ul class="price-features" style="border: 2px solid gray">
                                <table class="table" >
                                    <thead class="bg-primary">
                                        <tr>
                                            <th class="text-white text-center">Product Name</th>
                                            <th class="text-white text-center">Price</th>
                                            <th class="text-white text-center">Quantity</th>                                            
                                            <th class="text-white text-center">Sub Total</th>
                                            <th class="text-white text-center">Action</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $cart_product=Cart::Content();
                                    @endphp

                                    <tbody>
                                        @foreach($cart_product as $prod)
                                        <tr>
                                            <td class="text-left">{{ $prod->name }}</td>
                                            <td>{{ $prod->price }}</td>
                                            <td>
                                                <form action="{{ url('/cart.update/'.$prod->rowId) }}" method="post">
                                                    @csrf
                                                    <input type="number" name="qty" class="text-center" value="{{ $prod->qty }}" style="width:45px;">
                                                    <button type="submit" name="submit" style="margin-top: -2px" class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>
                                                </form>
                                            </td>
                                            <td>{{ $prod->price*$prod->qty }}</td>
                                            <td><a href="{{ URL::to('/cart.delete/'.$prod->rowId) }}"><i class="fas fa-trash-alt text-danger"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                            </ul>
                            <div class="pricing-footer bg-primary">
                                
                                <p style="font-size: 15px">Quantity: {{ Cart::count() }}</p>
                                <p style="font-size: 15px">Sub Total: {{ Cart::subtotal() }} </p>                                
                                <p style="font-size: 15px">Vat: {{ Cart::tax() }}</p><hr>
                                <p><h3 class="text-white">Grand Total: {{ Cart::total()}}</h3 ></p> 





                                <form action="{{ url('/invoice') }}" method="post">
                                    @csrf
                                    

                                    <div class="panel"><br>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <h4 class="text-primary">Customer Select
                                            <a href="#" class="btn btn-sm btn-primary waves-effect waves-light pull-right" data-toggle="modal" data-target="#con-close-modal">Add New</a></h4>
                                            @php
                                                DB::table('customers')->get();
                                            @endphp
                                        <select name="cus_id" class="form-control">
                                            <option disabled="" selected="">Select Customer</option>
                                            @foreach($customer as $cus)
                                            <option value="{{ $cus->id }}">{{ $cus->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                
                                
                            </div>
                        
                            <button class="btn btn-sm btn-success">Create Invoice</button>
                        </form>
                        </div> <!-- end Pricing_card -->
                        
                </div>
           
                <div class="col-lg-6">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead class="text-danger">
                            <tr>                                                            
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Category Name</th>
                                <th>Product Code</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                 
                        <tbody>
                            @foreach($product as $row)
                                <tr> 
                                    <form action="{{ route('add.cart') }}" method="post"> 
                                        @csrf  
                                        <input type="hidden" name="id" value="{{ $row->id }}">                                                        
                                        <input type="hidden" name="name" value="{{ $row->name }}">                                                        
                                        <input type="hidden" name="qty" value="1">                                                        
                                        <input type="hidden" name="price" value="{{ $row->sellPrice }}">                                                        
                                        <td>
                                            {{-- <a href="" style="font-size: 20"><i class="fas fa-plus-circle"></i></a> --}}
                                            <img src="{{ $row->photo }}" width="60px" height="60px"> </td>
                                        <td>{{ $row->name }}</td>                                                           
                                        <td>{{ $row->catName }}</td>                                                           
                                        <td>{{ $row->code }}</td>
                                        <td><button type="submit" class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i></button></td>  
                                    </form>
                                </tr>                                                                                                              
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>

            </div>

            

        </div> <!-- container -->
                   
    </div> <!-- content -->


    {{-- CUSTOMER ADD MODAL ------------------}}
    <form action="{{ route('insert.customer') }}" method="post" enctype="multipart/form-data">
        @csrf
    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog"> 
            <div class="modal-content"> 
                <div class="modal-header"> 
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                    <h4 style="text-align:center" class="modal-title text-success">Add New Customer</h4> 
                </div> 
                <div class="modal-body"> 
                    <div class="row"> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="field-1" class="control-label">Name</label> 
                                <input type="text" class="form-control" id="field-1" name="name" required> 
                            </div> 
                        </div> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="field-2" class="control-label">Shop Name</label> 
                                <input type="text" class="form-control" id="field-2" name="shopName" > 
                            </div> 
                        </div> 
                    </div> 
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="field-3" class="control-label">Address</label> 
                                <input type="text" class="form-control" id="field-3" name="address" required> 
                            </div> 
                        </div> 
                    </div> 
                    <div class="row"> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="field-1" class="control-label">Phone</label> 
                                <input type="text" class="form-control" id="field-1" name="phone" required> 
                            </div> 
                        </div> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="field-2" class="control-label">Photo</label> 
                                <img id="image" src="#" />
                                    <input type="file"  name="photo" accept="image/*"  required onchange="readURL(this);">
                            </div> 
                        </div> 
                    </div> 
                    <div class="panel">
                            <h4 style="text-align:center" class="text-success">Bank Account Details</h4>
                        <div class="row">
                            
                            <div class="col-md-6"> 
                                <div class="form-group"> 
                                    <label for="field-1" class="control-label">Account Name</label> 
                                    <input type="text" class="form-control" id="field-1" name="acName" required> 
                                </div> 
                            </div> 
                            <div class="col-md-6"> 
                                <div class="form-group"> 
                                    <label for="field-2" class="control-label">Account No</label> 
                                    <input type="text" class="form-control" id="field-2" name="acNo" required> 
                                </div> 
                            </div> 
                        </div> 
                        <div class="row"> 
                            <div class="col-md-6"> 
                                <div class="form-group"> 
                                    <label for="field-1" class="control-label">Bank Name</label> 
                                    <input type="text" class="form-control" id="field-1" name="bank" required> 
                                </div> 
                            </div> 
                            <div class="col-md-6"> 
                                <div class="form-group"> 
                                    <label for="field-2" class="control-label">Branch Name</label> 
                                    <input type="text" class="form-control" id="field-2" name="branch" required> 
                                </div> 
                            </div>
                        </div> 
                    </div>
                </div> 
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                    <button type="sublit" class="btn btn-info waves-effect waves-light">Submit</button> 
                </div> 
            </div> 
        </div>
    </div><!-- /.modal -->
    </form>


    <script type="text/javascript">
        function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  $('#image')
                      .attr('src', e.target.result)
                      .width(80)
                      .height(80);
              };
              reader.readAsDataURL(input.files[0]);
          }
       }
    </script>

@endsection

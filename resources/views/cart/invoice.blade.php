@extends('layouts.app')

@section('content')

<!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->                      
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 style="color:red" class="pull-left page-title">Welcome to Inventory Management System</h4>
                        <ol class="breadcrumb pull-right">                        
                            <li style="color:blue" class="active">IT Partner, Meherpur</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            
                            <div class="panel-body">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h4 class="text-right">Munif Electronics</h4>
                                        
                                    </div>
                                    <div class="pull-right">
                                        <h4>Invoice <br>
                                            <strong>{{ date('d.m.Y') }}</strong>
                                        </h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                        <div class="pull-left m-t-30">
                                            <address>
                                                <strong>Customer Name: {{ $customer->name }}</strong><br>
                                                Shop Name: {{ $customer->shopName }}<br>
                                                Address: {{ $customer->address }}<br>
                                                Phone: {{ $customer->phone }}<br>                                               
                                            </address>
                                        </div>
                                        <div class="pull-right m-t-30">
                                            <p><strong>Order Date: </strong> {{ date('d.m.Y') }}</p>
                                            <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
                                            {{-- @php
                                                $order=DB::table('orders')->select()->first();
                                            @endphp --}}
                                            {{-- {{-- <p class="m-t-10"><strong> --}}
                                                <p class="m-t-10"><strong>Order ID: </strong> {{-- {{ $order++ }} --}} 1</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-h-50"></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table m-t-30">
                                                <thead>
                                                    <tr><th>Sl No</th>
                                                    <th>Item</th>
                                                    <th>Description</th>                                                    
                                                    <th>Unit Cost</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                </tr></thead>
                                                <tbody>
                                                    @php
                                                        $sl=1;
                                                    @endphp
                                                    @foreach($contents as $row)
                                                    <tr>
                                                        <td>{{ $sl++ }}</td>
                                                        <td>{{ $row->name }}</td>
                                                        <td>Des</td>
                                                        <td>{{ $row->price }}</td>
                                                        <td>{{ $row->qty }}</td>
                                                        <td>{{ $row->price*$row->qty }}</td>
                                                        
                                                    </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="border-radius: 0px;">
                                    <div class="col-md-3 col-md-offset-9">
                                        <p class="text-right"><b>Sub-total:</b> {{ Cart::subtotal() }}</p>
                                        <p class="text-right">Discout: 12.9%</p>
                                        <p class="text-right">VAT: {{ Cart::tax() }}</p>
                                        <hr>
                                        <h3 class="text-right">Tk: {{ Cart::total()}}</h3>
                                    </div>
                                </div>
                                <hr>
                                <div class="hidden-print">
                                    <div class="pull-right">
                                        <a href="#" onclick="window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print text-white"></i></a>
                                        <a href="#" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Submit</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>



    </div> <!-- container -->
                        
        </div> <!-- content -->

        

    </div>


    {{-- PAYABLE MODAL ------------------}}
    <form action="{{ URL::to('/final.invoice') }}" method="POST">
        @csrf
    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog"> 
            <div class="modal-content"> 
                <div class="modal-header"> 
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                    <h4 class="modal-title text-success">Invoice of {{ $customer->name }}
                    <span class="pull-right">Total : {{ Cart::total()}}</span></h4> 
                </div> 
                <div class="modal-body"> 
                    <div class="row"> 
                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="field-1" class="control-label">Name</label> 
                                <select class="form-control" name="payStatus">
                                    <option value="Handcash">Hand Cash</option>
                                    <option value="Cheque">Cheque</option>
                                    <option value="Due">Due</option>

                                </select>
                            </div>
                            
                        </div>  
                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="field-2" class="control-label">Pay</label> 
                                <input type="text" class="form-control" id="field-2" name="pay" > 
                            </div> 
                        </div> 
                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="field-3" class="control-label">Due</label> 
                                <input type="text" class="form-control" id="field-3" name="due" > 
                            </div> 
                        </div>                              
                    </div> 
                </div> 
                <input type="hidden" name="cusId" value={{ $customer->id }}>
                <input type="hidden" name="orderDate" value={{ date('d.m.Y') }}>
                <input type="hidden" name="orderStatus" value="pending">
                <input type="hidden" name="totalProd" value="{{ Cart::count() }}">
                <input type="hidden" name="subTotal" value="{{ Cart::subtotal() }}">
                <input type="hidden" name="vat" value="{{ Cart::tax() }}">
                <input type="hidden" name="total" value="{{ Cart::total() }}">
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                    <button type="sublit" class="btn btn-info waves-effect waves-light">Submit</button> 
                </div> 
            </div> 
        </div>
    </div><!-- /.modal -->
    </form>

    

@endsection
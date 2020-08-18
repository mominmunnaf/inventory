@extends('layouts.app')

@section('content')

  
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    

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
                                    <div class="panel-heading">
                                        <h3 class="panel-title text-success" style="font-size:20px; text-align:center" >All Success Order</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead class="text-danger">
                                                        <tr>                                                            
                                                            <th>Date</th>
                                                            <th>Customer Name</th> 
                                                            <th>Quantity</th> 
                                                            <th>Selling Price</th>                                                                                     
                                                            <th>Payment Status</th>
                                                            <th>Order Status</th>
                                                            <th>Action</th>                                                            
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        @foreach($success as $row)
                                                        <tr>                                                            
                                                            <td>{{ $row->orderDate }}</td>
                                                            <td>{{ $row->name }}</td> 
                                                            <td>{{ $row->totalProd }}</td>
                                                            <td>{{ $row->total }}</td>
                                                            <td>{{ $row->payStatus }}</td> 
                                                            <td><span class="badge badge-success">{{ $row->orderStatus }}</span></td> 
                                                            <td>
                                                                <a class="btn btn-sm btn-primary" href="{{ URL::to('view-order-status/'.$row->id) }}" id="view">View</a>
                                                            </td>                                                                                                                   
                                                        @endforeach
                                                        
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- End Row -->


                    
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2015 © Moltran.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


           

           
       
               
            

           

     

 

@endsection
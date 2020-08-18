@extends('layouts.app')

@section('content')

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
               
            <!-- Horizontal form -->
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 style="font-size:20px; text-align:center" class="panel-title text-success">View Product </h3></div>
                    
           
                   
                            
                       
                            <div class="form-group">
                               
                                <div class="col-sm-5 pull-right">
                                    <p><img style="height:280px; width:210px;" class="img-circle bg-danger" src="{{ URL::to($view->photo) }}"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Product Name</label>
                                <div class="col-sm-4">
                                    <p>{{ $view->name }}</p>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Product Code</label>
                                <div class="col-sm-4">
                                    <p>{{ $view->code }}</p>
                                </div>
                            </div>
                            <div class="form-group">                               
                                <label for="inputEmail3" class="col-sm-3 control-label">Category</label>
                                <div class="col-sm-4">                                   
                                    <p>{{ $view->catName }}</p>                                                                         
                                </div>
                            </div>
                            <div class="form-group">                               
                                <label for="inputEmail3" class="col-sm-3 control-label">Supplier</label>
                                <div class="col-sm-4">                                   
                                    <p>{{ $view->shopName }}</p>                                                                         
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Godown</label>
                                <div class="col-sm-4">
                                    <p>{{ $view->godown }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Route</label>
                                <div class="col-sm-4">
                                    <p>{{ $view->route }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Buying Date</label>
                                <div class="col-sm-4">
                                    <p>{{ $view->buyDate }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Expire Date</label>
                                <div class="col-sm-4">
                                    <p>{{ $view->sellDate }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Buying Price</label>
                                <div class="col-sm-4">
                                    <p>{{ $view->buyPrice }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Selling Price</label>
                                <div class="col-sm-4">
                                    <p>{{ $view->sellPrice }}</p>
                                </div>
                            </div>
                            
                            
                            

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-6 control-label"></label>
                                <div class="col-sm-6 pull-right">
                                    {{-- <a class="btn btn-sm btn-info " href="{{ URL::to('view-employee') }}" id="edit">View another Profile</a> --}}
                                    <a class="btn btn-sm btn-danger " href="{{ route('add.product') }}" id="ad">Add Product</a>
                                    <a class="btn btn-sm btn-success " href="{{ route('all.product') }}" id="all">All Product List</a>
                                </div>
                            </div>

                           
                            {{-- <a class="btn btn-sm btn-success" href="{{ URL::to('view-employee/'.$row->id) }}" id="view">View</a> --}}
                            
                            
                            
                            
                        
                    </div> <!-- panel-body -->
                </div> <!-- panel -->
            </div> <!-- col -->

        </div> <!-- End row -->

           

            

        </div> <!-- container -->
                   
    </div> <!-- content -->

   

@endsection
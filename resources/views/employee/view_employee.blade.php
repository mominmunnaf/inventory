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
                    <div class="panel-heading"><h3 style="font-size:20px; text-align:center" class="panel-title text-success">View Employee </h3></div>
                    
           
                   
                            
                       
                            <div class="form-group">
                               
                                <div class="col-sm-5 pull-right">
                                    <p><img style="height:250px; width:220px;" class="img-circle bg-danger" src="{{ URL::to($view->photo) }}"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-4">
                                    <p>{{ $view->name }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Father's Name</label>
                                <div class="col-sm-4">
                                    <p>{{ $view->fname }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                <div class="col-sm-4">
                                    <p>{{ $view->address }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Phone</label>
                                <div class="col-sm-4">
                                    <p>{{ $view->phone }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">NID No</label>
                                <div class="col-sm-4">
                                    <p>{{ $view->nid }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-4">
                                    <p>{{ $view->email }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Salary</label>
                                <div class="col-sm-4">
                                    <p>{{ $view->salary }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Experience</label>
                                <div class="col-sm-4">
                                    <p>{{ $view->experience }}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label"></label>
                                <div class="col-sm-8">                                    
                                    <a class="btn btn-sm btn-danger " href="{{ route('add.employee') }}" id="ad">Add Employee</a>
                                    <a class="btn btn-sm btn-success " href="{{ route('all.employee') }}" id="all">All Employee List</a>
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
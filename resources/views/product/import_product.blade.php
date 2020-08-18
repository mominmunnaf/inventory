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
                <div class="panel panel-info">
                    <div class="panel-heading"><h1  class="panel-title text-white">Import Product
                        <a href="{{ route('export') }}" class="btn btn-sm btn-danger pull-right">Download xlsx</a></h1>
                    
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="{{ route('import') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">xlsx File Import</label>
                                <div class="col-sm-9">
                                    <input type="file" name="importFile">
                                </div>
                            </div>                                                    
                        
                            
                            <div class="form-group m-b-0">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit">Upload</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- panel-body -->
                </div> <!-- panel -->
            </div> <!-- col -->

        </div> <!-- End row -->

           

            

        </div> <!-- container -->
                   
    </div> <!-- content -->

    

@endsection
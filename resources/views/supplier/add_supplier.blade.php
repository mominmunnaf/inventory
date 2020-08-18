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
                    <div class="panel-heading"><h1 style="font-size:17px; text-align:center" class="panel-title text-success">Add Supplier</h1></div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="{{ route('insert.supplier') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" placeholder="Name" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="address" placeholder="Address" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Phone</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="phone" placeholder="Phone" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Bank Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="bank" placeholder="Bank" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Branch Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="branch" placeholder="Branch" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Account No</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="acNo" placeholder="Account No" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Account Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="acName" placeholder="Account Name" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Shop Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="shopName" placeholder="Shop Name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <label for="inputEmail3" class="col-sm-3 control-label">Photo</label>
                                    <div class="col-sm-9">
                                    <img id="image" src="#" />
                                    <input type="file"  name="photo" accept="image/*"  required onchange="readURL(this);">
                            </div>
                            
                            
                            <div class="form-group m-b-0">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Add Supplier</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- panel-body -->
                </div> <!-- panel -->
            </div> <!-- col -->

        </div> <!-- End row -->

           

            

        </div> <!-- container -->
                   
    </div> <!-- content -->

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
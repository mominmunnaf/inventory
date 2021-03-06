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
                    <div class="panel-heading"><h3 style="font-size:20px; text-align:center" class="panel-title text-success">Edit Employee</h3></div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="{{ URL::to('update.employee/'.$edt->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                           
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" value="{{ $edt->name }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Father's Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="fname" value="{{ $edt->fname }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="address" value="{{ $edt->address }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Phone</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="phone" value="{{ $edt->phone }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">NID No</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nid" value="{{ $edt->nid }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" value="{{ $edt->email }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Salary</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="salary" value="{{ $edt->salary }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Experience</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="experience" value="{{ $edt->experience }}" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Previous Photo</label>
                                <div class="col-sm-9">
                                <img src="{{ URL::to($edt->photo) }}"  style="height: 80px; width: 80px;">
                                <input type="hidden" name="old_photo" value="{{ $edt->photo }}">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">New Photo</label>
                                <div class="col-sm-9">
                                <img id="image" src="#" />
                                <input type="file"  name="photo" accept="image/*" onchange="readURL(this);">
                            </div>
                            
                            
                            <div class="form-group m-b-0">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Update Employee</button>
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
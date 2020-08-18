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
                    <div class="panel-heading"><h1 style="font-size:17px; text-align:center" class="panel-title text-success">Add Product</h1></div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="{{ route('insert.product') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Product Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" placeholder="Name" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Product Code</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="code" placeholder="Product Code" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Catagory</label>
                                <div class="col-sm-9">
                                    @php
                                    $cat=DB::table('categories')->get();
                                    @endphp
                                    <select name="catId" class="form-control">
                                        @foreach($cat as $row)
                                        <option value="{{ $row->id }}">{{ $row->catName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Supplier Name</label>
                                <div class="col-sm-9">
                                    @php
                                    $sup=DB::table('suppliers')->get();
                                    @endphp
                                    <select name="supId" class="form-control">
                                        @foreach($sup as $row)
                                        <option value="{{ $row->id }}">{{ $row->shopName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Godown</label>
                                <div class="col-sm-9">
                                    <select name="godown" class="form-control">
                                        <option value="Godown A">Godown A</option>
                                        <option value="Godown B">Godown B</option>
                                        <option value="Godown C">Godown C</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Route</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="route" placeholder="Route" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Buying Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="buyDate" placeholder="Buying Date" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Expire Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="sellDate" placeholder="Expire Date" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Buying Price</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="buyPrice" placeholder="Buying Price" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Selling Price</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="sellPrice" placeholder="Selling Price" required>
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <label for="inputEmail3" class="col-sm-3 control-label">Product Image</label>
                                    <div class="col-sm-9">
                                    <img id="image" src="#" />
                                    <input type="file"  name="photo" accept="image/*"  required onchange="readURL(this);">
                            </div>
                            
                            
                            <div class="form-group m-b-0">                                
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Add Product</button>
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
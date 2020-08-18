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
                    <div class="panel-heading"><h3 style="font-size:20px; text-align:center" class="panel-title text-success">Edit Product</h3></div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="{{ URL::to('update.product/'.$edt->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                           
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Product Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" value="{{ $edt->name }}" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Product Code</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="code" value="{{ $edt->code }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                @php
                                    $cat=DB::table('categories')->get();
                                @endphp                               
                                <label for="inputEmail3" class="col-sm-3 control-label">Category</label>
                                <div class="col-sm-9">
                                    <select name="catName" class="form-control">
                                        @foreach ($cat as $row)    
                                        <option value="{{ $row->id }}" <?php if($edt->catId==$row->id) { echo "selected";} ?> >{{ $row->catName }}</option>                                 
                                        @endforeach
                                    </select>                     
                                </div>
                            </div>
                            
                            <div class="form-group">                               
                                @php
                                    $sup=DB::table('suppliers')->get();
                                @endphp                               
                                <label for="inputEmail3" class="col-sm-3 control-label">Supplier</label>
                                <div class="col-sm-9">
                                    <select name="shopName" class="form-control">
                                        @foreach ($sup as $row)    
                                        <option value="{{ $row->id }}" <?php if($edt->supId==$row->id) { echo "selected";} ?> >{{ $row->shopName }}</option>                                 
                                        @endforeach
                                    </select>                      
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Godown</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="godown" value="{{ $edt->godown }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Route</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="route" value="{{ $edt->route }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Buy Date</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="buyDate" value="{{ $edt->buyDate }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Selling Date</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="sellDate" value="{{ $edt->sellDate }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Buying Price</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="buyPrice" value="{{ $edt->buyPrice }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Selling Price</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="sellPrice" value="{{ $edt->sellPrice }}" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Previous Product Image</label>
                                <div class="col-sm-9">
                                <img src="{{ URL::to($edt->photo) }}"  style="height: 80px; width: 80px;">
                                <input type="hidden" name="old_photo" value="{{ $edt->photo }}">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">New Product Image</label>
                                <div class="col-sm-9">
                                <img id="image" src="#" />
                                <input type="file"  name="photo" accept="image/*" onchange="readURL(this);">
                            </div>
                            
                            
                            <div class="form-group m-b-0">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Update Product</button>
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
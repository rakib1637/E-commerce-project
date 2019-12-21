@extends('Backend.layouts.mastertemplate')
 @section('adminpagetemplate')
<!-- Begin Page Content -->
        <div class="container-fluid">

         
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Edit Brand</h1>

          <!-- Content Row -->
          <div class="row">
          	<div class="col-md-12">
          		<div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Edit The Brand With Proper Information </h6>
                </div>
                <div class="card-body">
                	@include ('Backend.allinfo.messages')
                	<!--kon page a date show korbe ai ta-->
	                  <form action="{{route('admin.brand.update',$brand->id)}} " method="POST"
	                  enctype="multipart/form-data">
	                  	<!--proti filed token akare jay-->
	                  	{{csrf_field()}}
	                  	<div class="form-group">
	                  		<label for="name">Name</label>
	                  		<input type="text" name="name" class="form-control" value="{{$brand->name}}">
	                  	</div>
	                  	<div class="form-group">
	                  		<label for="description">Description</label>
	                  		<textarea type="text" name="description" class="form-control" rows="10" cols="90" >{{$brand->desc}}</textarea> 
	                  	</div>
              
	                   <div class="form-group">
                        <label for="Brandimages">Brand Image</label>
                        @if ($brand->image==NULL)
                        No Thumbnail
                        @else
                        <img src="{{asset('vendor-admin/brand-images/' .$brand->image) }}" width="100">
                        @endif
                        <br><br><br>
                        <input type="file" name="image" class="form-control">
                      </div>


	                  	<div class="form-group">
	                  		<input type="submit" name="addBrand"  value="Add brand" class="btn btn-primary btn-block">
	                  	</div>

	                  	

	                  </form>
                </div>
              </div>
          	</div>
          	
          </div>

          	</div>
@endsection
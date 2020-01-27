@extends('Backend.layouts.mastertemplate')
 @section('adminpagetemplate')
<!-- Begin Page Content -->
        <div class="container-fluid">

         
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Edit Division</h1>

          <!-- Content Row -->
          <div class="row">
          	<div class="col-md-12">
          		<div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Edit The Division With Proper Information </h6>
                </div>
                <div class="card-body">
                	@include ('Backend.allinfo.messages')
                	<!--kon page a date show korbe ai ta-->
	                  <form action="{{route('admin.divisions.update',$divisions->id)}} " method="POST"
	                  enctype="multipart/form-data">
	                  	<!--proti filed token akare jay-->
	                  	{{csrf_field()}}
	                  	<div class="form-group">
	                  		<label for="name">Name</label>
	                  		<input type="text" name="name" class="form-control" value="{{$divisions->name}}">
	                  	</div>
	                  	<div class="form-group">
                        <label for="priority">Priority Number in list</label>
                        <input type="text" name="priority" class="form-control" value="{{$divisions->priority}}">
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
@extends('Backend.layouts.mastertemplate')
 @section('adminpagetemplate')
<!-- Begin Page Content -->
        <div class="container-fluid">

         
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Edit Category</h1>

          <!-- Content Row -->
          <div class="row">
          	<div class="col-md-12">
          		<div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Edit The Category With Proper Information </h6>
                </div>
                <div class="card-body">
                	@include ('Backend.allinfo.messages')
                	<!--kon page a date show korbe ai ta-->
	                  <form action="{{route('admin.category.update', $category->id)}}" method="POST"
	                  enctype="multipart/form-data">
	                  	<!--proti filed token akare jay-->
	                  	{{csrf_field()}}
	                  	<div class="form-group">
	                  		<label for="name">Name</label>
	                  		<input type="text" name="name" class="form-control" value="{{$category->name}}">
	                  	</div>
	                  	<div class="form-group">
	                  		<label for="description">Description</label>
	                  		<textarea type="text" name="description" class="form-control" rows="10" cols="90" >{{$category->desc}}</textarea> 
	                  	</div>
                      <div class="form-group">
                        <label for="parent_category">Parent Category</label>
                        
                        <select class="form-control" name="parent_id">
                          <option>Please Select a Primary Category</option>
                          @foreach($primary_categories as $cat)
                          <option value="{{$cat->id}}" {{ $cat->id==$category->parent_id? 'selected' : '' }} > {{$cat->name}} </option>
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="Categoryimage">Categroy Image</label>
                        @if ($category->image==NULL)
                        No Thumbnail
                        @else
                        <img src="{{asset('vendor-admin/img/' .$category->image) }}" width="100">
                        @endif
                        <br><br><br>
                        <input type="file" name="image" class="form-control">
                      </div>
	                  


	                  	<div class="form-group">
	                  		<input type="submit" name="addcategory"  value="Add Category" class="btn btn-primary btn-block">
	                  	</div>

	                  	

	                  </form>
                </div>
              </div>
          	</div>
          	
          </div>

          	</div>
@endsection
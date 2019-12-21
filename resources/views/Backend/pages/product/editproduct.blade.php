@extends('Backend.layouts.mastertemplate')
 @section('adminpagetemplate')
<!-- Begin Page Content -->
        <div class="container-fluid">

         
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Edit Product</h1>

          <!-- Content Row -->
          <div class="row">
          	<div class="col-md-12">
          		<div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Edit The Product With Proper Information </h6>
                </div>
                <div class="card-body">
                	@include ('Backend.allinfo.messages')
                	<!--kon page a date show korbe ai ta-->
	                  <form action="{{route('admin.product.update', $product->id)}}" method="POST"
	                  enctype="multipart/form-data">
	                  	<!--proti filed token akare jay-->
	                  	{{csrf_field()}}
	                  	<div class="form-group">
	                  		<label for="title">Title</label>
	                  		<input type="text" name="title" class="form-control" value="{{$product->title}}">
	                  	</div>
	                  	<div class="form-group">
	                  		<label for="description">Description</label>
	                  		<textarea type="text" name="description" class="form-control">{{$product->description}}</textarea> 
	                  	</div>
	                  
	                  	<div class="form-group">
	                  		<label for="quantity">Quantity</label>
	                  		<input type="number" name="quantaty" class="form-control" value="{{$product->quantaty}}">
	                  	</div>

	                  	<div class="form-group">
	                  		<label for="price">Price</label>
	                  		<input type="number" name="price" class="form-control" value="{{$product->price}}">
	                  	</div>

	                  	<div class="form-group">
	                  		<label for="offerprice">Offer Price</label>
	                  		<input type="number" name="offerprice" class="form-control" value="{{$product->offer_price}}">
	                  	</div>

	                  				                  	<div class="form-group">
	                  		<label for="selectcategory">Select Category</label>
	                  		<select class="form-control" name="category_id">
	                  			<option value="">Please select a category for the product</option>
	                  			@foreach(App\Models\category::orderby('id','asc')->where('parent_id', NULL)->get() as $parent)
	                  			<option value="{{$parent->id}}">{{$parent->name}}</option>

	                  			@foreach(App\Models\category::orderby('id','asc')->where('parent_id',$parent->id)->get() as $child)
	                  			<option value="{{$child->id}}">-->{{$child->name}}</option>
	                  			@endforeach
	                  			@endforeach
	                  		</select>
	                  	</div>
	                  	<div class="form-group">
	                  		<label for="selectbrands">Select Brands</label>
	                  		<select class="form-control" name="brand_id">
	                  			<option value="">Please select a brand for the product</option>
	                  			@foreach(App\Models\brands::orderby('name','asc')->get() as $brand)
	                  			<option value="{{$brand->id}}">{{$brand->name}}</option>
	                  			@endforeach

	                  		</select>
	                  	</div>

	                  	<div class="form-group">
	                  		<label for="product_image">Upload Product Image </label>
	                  		<input type="file" name="product_image[]" class="">	                  		
	                  	</div>

	                  		<div class="form-group">
	                  		<label for="product_image">Upload Product Image </label>
	                  		<input type="file" name="product_image[]" class="">	                  		
	                  	</div>

						<div class="form-group">
	                  		<label for="product_image">Upload Product Image </label>
	                  		<input type="file" name="product_image[]" class="">	                  		
	                  	</div>

	                  	<div class="form-group">
	                  		<label for="product_image">Upload Product Image </label>
	                  		<input type="file" name="product_image[]" class="">	                  		
	                  	</div>

	                  	<div class="form-group">
	                  		<input type="submit" name="editproduct"  value="update Product" class="btn btn-primary btn-block">
	                  	</div>

	                  </form>
                </div>
              </div>
          	</div>
          </div>
          	</div>
@endsection
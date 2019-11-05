@extends('admin.layouts.mastertemplate')
 @section('adminpagetemplate')
<!-- Begin Page Content -->
        <div class="container-fluid">

         
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Manage All Product</h1>

          <!-- Content Row -->
          <div class="row">
          	<div class="col-md-12">
          		<div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">View | Update | Delete Indivudual Products </h6>
                </div>
                <div class="card-body">

                	<table class="table">
						  <thead class="thead-dark table-striped">
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Product Title</th>
						      <th scope="col">Price</th>
						      <th scope="col">Quantaty</th>
						      <th scope="col">Status</th>
						      <th scope="col">Action</th>
						    </tr>
						  </thead>
						  <tbody>
						  	@php
						  		$i=1;
						  	@endphp
						  	@foreach ($products as $product)
						    <tr>
						      <th scope="row">{{$i}}</th>
						      <td>{{$product->title}}</td>
						      <td>{{$product->price}}</td>
						      <td>{{$product->quantaty}}</td>
						      <td>{{$product->status}}</td>
						      <td>
						      		<div class="btn-group">
						      			<a href="{{route('editproduct',$product->id)}}" class="btn btn-primary btn-sm">Update</a>
						      			<a href="" class="btn btn-danger btn-sm">Delete</a>
						      		</div>
						      </td>
						    </tr>
						    @php 
						    	$i++
						    @endphp
						    @endforeach
						  </tbody>
					</table>
                </div>
              </div>
          	</div>
          	
          </div>

          	</div>
@endsection
@extends('Backend.layouts.mastertemplate')
 @section('adminpagetemplate')
<!-- Begin Page Content -->
        <div class="container-fluid">

         
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Manage All Districts</h1>
          <!--succes notification-->
         

          <!-- Content Row -->
          <div class="row">
          	<div class="col-md-12">
          		<div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">View | Update | Delete Indivudual Districts </h6>
                </div>
                <div class="card-body">

                	<table class="table">
						  <thead class="thead-dark table-striped">
						    <tr>
						      <th scope="col">No.</th>
						      <th scope="col">District Name</th>
						      
						      <th scope="col">Priority</th>
						     
						      
						      <th scope="col">Action</th>
						    </tr>
						  </thead>
						  <tbody>
						  	@php
						  		$i=1;
						  	@endphp
						  	@foreach ($districts as $district)
						    <tr>
					      <th scope="row">{{$i}}</th>
						      <td>{{ $district->name }}</td>
						      <td>{{ $district->priority }}</td>
						     
						     
						      <td>
						      		<div class="btn-group">
						      			<a href="{{route('editdistricts', $district->id)}}" class="btn btn-primary btn-sm">Update</a>
						      			<a href="{{$district->id}}" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#deletedistrict{{$district->id}}">Delete</a>

						      			<!--category Delete Modal Content Start -->
							      		<div class="modal fade" id="deletedistrict{{$district->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLabel">Did You Want to Delete The category ?</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										        <form action="{{route('admin.districts.delete', $district->id)}}" method="POST">
										        	{{ csrf_field () }}
										        	<button type="submit" class="btn btn-danger btn-block">Confrim Delete</button>
										        </form>
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										        <button type="button" class="btn btn-primary">Save changes</button>
										      </div>
										    </div>
										  </div>
										</div>
										<!--category Delete Modal Content End-->

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
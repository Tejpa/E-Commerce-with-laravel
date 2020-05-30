@extends('layouts.master')

@section('content')
  <div class="container">
  	@if (session('status'))
	<div class="alert alert-success" role="alert">
	 {{ session('status') }}
	</div>
	@endif
  	 <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Product Title</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($products as $product)
    <tr>
      <th>{{ $product->p_title }}</th>
      <td>{{ $product->p_name }}</td>
      <td>{{ $product->p_price }}</td>
      <td><a href="/products/edit/{{$product->id}}" class="btn btn-primary">Update</a></td>
       <td>
       	<form action="/delete/{{$product->id}}" method="POST">
	      @method('DELETE')
	      @csrf
	      <button type="submit" class="btn btn-danger">Delete</button>
	    </form></td> 
    </tr>
  </tbody>
  @endforeach
</table>
  </div>
  <div class="pagination right"><span>{{ $products->links() }}</span></div>
  
 
@endsection
@extends('layouts.master')

@section('content')
  <div class="container">
  	 @if (session('status'))
    <div class="alert alert-success" role="alert">
     {{ session('status') }}
    </div>
    @endif
  	 <form action="{{ url('/store') }}" method="POST" enctype="multipart/form-data">
  	 	@csrf
	  <div class="form-group">
	    <label for="ProductTitle">Product Title</label>
	    <input type="text" class="form-control" name="p_title">
	  </div>
	  <div class="form-group">
	    <label for="ProductName">Product Name</label>
	    <input type="text" class="form-control" name="p_name">
	  </div>
       <div class="form-group">
	    <label for="ProductDesc">Product Description</label>
	    <textarea class="form-control" name="p_description" rows="3"></textarea>
	  </div>
	  <div class="form-group">
	    <label for="ProductPrice">Product Price</label>
	    <input type="text" class="form-control" name="p_price">
	  </div>
	  <div class="form-group">
	    <label for="ProductImage">Product Image</label>
	    <input type="file" class="form-control" name="p_image">
	  </div>
	 <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
@endsection
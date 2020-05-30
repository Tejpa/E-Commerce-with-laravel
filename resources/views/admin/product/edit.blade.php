@extends('layouts.master')

@section('content')
 <div class="container">
   <div class="card">
      <div class="card-body">
        <form action="/products/update/{{$products->id}}" method="POST">
        @method('PUT')
         @csrf 
         <div class="form-group">
            <label>Product Title</label>
            <input type="text" class="form-control" name="p_title"  value="{{ $products->p_title }}" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label>Product Name</label>
            <input type="text" class="form-control" name="p_name"  value="{{ $products->p_name }}" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label>Product Price</label>
            <input type="text" class="form-control" name="p_price"  value="{{ $products->p_price }}" aria-describedby="emailHelp">
          </div>
          
          <button type="submit" class="btn btn-success">Submit</button>
          <a href="/products/proindex" class="btn btn-danger">Cancel</a>
          </form>
      </div>
    </div>
 </div>
@endsection
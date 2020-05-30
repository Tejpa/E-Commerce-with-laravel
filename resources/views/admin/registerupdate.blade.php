@extends('layouts.master')

@section('content')
 <div class="container">
   <div class="card">
      <div class="card-body">
        <form action="/userupdate/{{$user->id}}" method="POST">
        @method('PUT')
         @csrf 
         <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="name"  value="{{ $user->name }}" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label>Example select</label>
              <select name="usertype" class="form-control">
                <option>admin</option>
                <option>user</option>
              </select>
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
          <a href="/users" class="btn btn-danger">Cancel</a>
          </form>
      </div>
    </div>
 </div>
@endsection
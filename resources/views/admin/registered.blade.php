@extends('layouts.master')

@section('content')
 
                  <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Users List</div>
                            <div class="card-body">
                               @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                 {{ session('status') }}
                                </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Usertype</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                       <tbody>
                                           @foreach($users as $user)
                                          <tr>
                                           <td>{{ $user->name }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->usertype }}</td>
                                            <td>
                                            <a href="/update/{{$user->id}}" class="btn btn-primary">Update</a>
                                          </td>
                                          <td>
                                            <form action="/delete/{{$user->id}}" method="POST">
                                              @method('DELETE')
                                              @csrf
                                              <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                          </td>
                                         </tr>
                                        @endforeach 
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <span>{{ $users->links() }}</span>
@endsection
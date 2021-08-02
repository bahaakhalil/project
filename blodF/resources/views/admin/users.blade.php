@extends('adminLayout')
@section('content')
<div class="row">

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>
                    Users
                </h2>
            </div>

            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Admin?</th>
                            <th>No of Posts</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->is_admin ? "Yes" : "No"}}</td>
                            <td>{{$user->posts->count()}}</td>
                            <td>
                                <a href="/admin/users/delete/{{$user->id}}" class="btn btn-xs btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>



            </div>
        </div>
    </div>

</div>
@endsection


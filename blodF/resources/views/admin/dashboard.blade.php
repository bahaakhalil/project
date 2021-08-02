@extends('adminLayout')

@section('content')
<div class="row content">
    <div class="col-sm-12">
      <div class="well">
        <h4>Dashboard</h4>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4>Users</h4>
            <p>{{$usersCount}}</p>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Posts</h4>
            <p>{{$postsCount}}</p>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Categories</h4>
            <p>{{$categoriesCount}}</p>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Tags</h4>
            <p>{{$tagsCount}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

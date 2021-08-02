@extends('adminLayout')

@section('content')
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2>
                  {{$post->title}}
                  <small>by Prof. General Huel IV</small>

                  <a href="/admin/posts" class="btn btn-default pull-right"
                    >Go Back</a
                  >
                </h2>
              </div>

              <div class="panel-body">
                <p>
                  {{$post->body}}
                </p>

                <p><strong>Category: </strong>{{$post->category->name}}</p>
                <p><strong>Tags: </strong></p>
              </div>
            </div>
          </div>
        </div>
        @endsection

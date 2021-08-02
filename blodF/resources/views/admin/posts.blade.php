@extends('adminLayout')

@section('content')
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Posts

                            <a href="/posts/create" class="btn btn-default pull-right">Create New</a>
                            <a href="/excel" class="btn btn-default pull-right">Export Excel</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Body</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                    <th>Published</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($posts as $post)
                                    <tr>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->body}}</td>
                                        <td>{{$post->user->name}}</td>
                                        <td>{{ object_get($post , 'category.name' , '-') }}</td>
                                        <td>
                                            @foreach ($post->tags as $tag)
                                                <span class="text-info">{{$tag->name}}</span>
                                                <br>
                                            @endforeach
                                        </td>
                                        <td>
                                          {{$post->published ? "Yes" : "No"}}
                                        </td>
                                        <td>
                                            <a href="/posts/publish/{{$post->id}}" class="btn btn-xs {{$post->published ?  "btn-default" : "btn-warning"}}">{{$post->published ? "UnPublish" : "Publish"}}</a>
                                            <a href="/posts/{{$post->id}}" class="btn btn-xs btn-success">Show</a>
                                            <a href="/posts/{{$post->id}}/edit" class="btn btn-xs btn-info">Edit</a>
                                            <a href="/posts/delete/{{$post->id}}" class="btn btn-xs btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach


                            </tbody>
                        </table>

                        {{-- {{$posts->render()}} --}}
                        {{$posts->links()}}

                    </div>
                </div>
            </div>

        </div>
@endsection

@extends('adminLayout')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        Tags

                        <a href="/admin/tags/create" class="btn btn-default pull-right">Create New</a>
                    </h2>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($tags as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <a href="/admin/tags/{{$item->id}}/edit" class="btn btn-xs btn-info">Edit</a>
                                        <form action="/admin/tags/{{$item->id}}" method="post" style="display: inline;">
                                            @csrf
                                            @method('delete')
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

    </div>
@endsection

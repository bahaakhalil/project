@extends('adminLayout')

@section('content')
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Comments

                            <a href="" class="btn btn-default pull-right">Create New</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Post</th>
                                    <th>Comment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $item)
                                <tr>
                                    <td>{{$item->content}}</td>
                                    <td>Quaerat accusantium rem facilis assumenda doloremque. Esse ex ut vero rerum
                                        pariatur. Dolorem aut dolores nisi ad natus quis. Est eos possimus consequatur
                                        illum velit. Ut consequuntur voluptate nemo voluptatum autem.</td>
                                    <td>
                                        <a href="" data-method="DELETE" data-token="32Mxrb2s2QPyv3C1h4iYcbfZBT7PmU7Tfm9koxkk"
                                            data-confirm="Are you sure?" class="btn btn-xs btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <ul class="pagination">

                            <li class="disabled"><span>«</span></li>





                            <li class="active"><span>1</span></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>


                            <li><a href="" rel="next">»</a></li>
                        </ul>


                    </div>
                </div>
            </div>

        </div>
@endsection

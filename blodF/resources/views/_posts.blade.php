<div class="col-md-12" id="posts">
    @foreach ($posts as $item)
    <div class="panel panel-default">
        <div class="panel-heading">
            {{$item->title}} - <small>by: {{$item->user->name}}</small>

            <span class="pull-right">
                Thu, Jan 10, 2019 7:50 AM
            </span>
        </div>

        <div class="panel-body">
            <p>{{$item->body}}</p>
            <p>
                Tags:
                <span class="label label-danger">No tag found.</span>
            </p>
            <p>
                <span class="btn btn-sm btn-success">{{$item->category->name}}</span>
                <span class="btn btn-sm btn-info">Comments <span class="badge"></span></span>

                <a href="/{{$item->id}}" class="btn btn-sm btn-primary">See more</a>
            </p>
        </div>
    </div>
    @endforeach

    <div align="center">
        <ul class="pagination">

            <li class="disabled"><span>« Previous</span></li>


            <li><a href="" rel="next">Next »</a></li>
        </ul>

    </div>

</div>

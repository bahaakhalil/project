@extends('adminLayout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        Create Tag

                        <a href="/admin/tags" class="btn btn-default pull-right">Go Back</a>
                    </h2>
                </div>

                <div class="panel-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $item)
                                <strong>{{ $item }}</strong>
                            @endforeach
                        </div>
                    @endif
                    <form method="POST" action="/admin/tags" accept-charset="UTF-8" class="form-horizontal" role="form">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-md-2 control-label">Name</label>
                            <div class="col-md-8">
                                <input class="form-control" autofocus="autofocus" name="name" type="text" id="name" value="{{old('name')}}" />
                                @error('name')
                                 <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

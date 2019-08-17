@extends('layout')

@section('content')
    <div class="container">
        <br><br>
        <h3>Update task # - {{$task->title}}</h3>

        @if($errors->any())
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-sm-12">
                <form  method="POST" action="{{route('tasks.update',$task->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" value="{{old('title')}}">
                        <br>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control">{{old('description')}}</textarea>
                        <br>
                        @if($task->logo)
                            <img src="{{$task->logo}}" alt="">
                            @endif
                        <br>
                        <label for="logo">Chage logo</label>
                        <input type="file" accept="image/png,image/jpg,image/gif" name="logo">
                        <button class="btn btn-success" type="submit">Update</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection

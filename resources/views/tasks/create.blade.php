@extends('layout')

@section('content')
    <div class="container">
        <br><br>
        <h3>Create tasks</h3>

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
                <form  method="POST" action="{{ route('tasks.store') }}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" value="{{old('title')}}">
                        <br>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control">{{old('description')}}</textarea>
                        <br>

                        <input type="file" accept="image/png,image/jpg" name="logo">
                        <br><br>
                        <button class="btn btn-success" type="submit">Add</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection

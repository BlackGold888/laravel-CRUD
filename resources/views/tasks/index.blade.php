@extends('layout')

@section('content')
    <div class="container">
        <br><br>
        <h3>My tasks</h3>
        <a href="{{route('tasks.create')}}" class="btn btn-success">Create</a>
        <br><br>
        <div class="row">
            <div class="col-sm-10 col-md-offset-1">
                <table class="table table-dark table-hover">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Tittle</td>
                        <td>Description</td>
                        <td>Logo</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                    <tr>
                        <td>{{$task->id }}</td>
                        <td>{{$task->title}}</td>
                        <td>{{$task->description}}</td>

                        <td><img src="{{asset($task->logo)}}" alt=""></td>

                        <td>
                            <a href="{{route('tasks.show',$task->id)}}">
{{--                                <i class="glyphicon glyphicon-eye-open"></i>--}}
                                OPEN
                            </a>
                            <a href="{{route('tasks.edit',$task->id)}}">
                                Edit
                                <i class="glyphicon glyphicon-eye-edit"></i>
                            </a>
                            <form action="{{route('tasks.destroy',$task->id)}}" method="GET">
                               <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Do really want to delete this Task?')">REMOVE</button>
                            </form>


                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

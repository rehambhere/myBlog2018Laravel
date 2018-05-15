@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead >
                <tr>
                    <th scope="col">#</th>
                    <th>image</th>
                    <th scope="col">Name</th>
                    <th scope="col">edit</th>
                    <th scope="col">Delete</th>

                </thead>
                <tbody>
                @foreach($posts as $post)

                    <tr>
                        <td>{{$post->id}}</td>
                        <td><img src="{{$post->fetured}}" alt="" width="50px" height="50px"></td>
                        <td>{{$post->name}}</td>
                        <td><a href="/admin/posts/{{$post->id}}/edit" class="btn btn-info">Edit</a> </td>
                        <td><a href="{{route('posts.destroy',[$post->id])}}" class="btn btn-danger">Delete</a></td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
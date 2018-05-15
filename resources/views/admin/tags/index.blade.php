@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead >
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">edit</th>
                    <th scope="col">Delete</th>

                </thead>
                <tbody>
                @foreach($tags as $tag)

                    <tr>
                        <td>{{$tag->id}}</td>
                        <td>{{$tag->tags}}</td>
                        <td><a href="{{route('tags.edit',[$tag->id])}}" class="btn btn-danger">Edit</a> </td>
                        <td><a href="">delete</a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
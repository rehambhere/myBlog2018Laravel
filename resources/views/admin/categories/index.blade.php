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
            @foreach($categories as $category)

                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td><a href="/admin/categories/{{$category->id}}/edit" class="btn btn-danger">Edit</a> </td>
                <td><a href="#"
                    onclick="var result =confirm('are you want delete?');
                    if(result){
    event.preventDefault();
    document.getElementById('form-delete').submit();
}"

                        class="btn btn-success">Delete</a>
                    <form id='form-delete' action="{{route('categories.destroy',[$category->id])}}" method="post" style="display:none">
                        <input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
                    </form>
                </td>

                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>
    @endsection
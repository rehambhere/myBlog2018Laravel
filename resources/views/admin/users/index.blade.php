@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead >
                <tr>
                    <th scope="col">#</th>
                    <th>img</th>
                    <th scope="col">Name</th>
                    <th scope="col">Permition</th>

                    <th scope="col">edit</th>
                    <th scope="col">Delete</th>

                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td><img src="{{asset($user->profile->avater)}}" height="50px;" width="50px"></td>
                        <td>{{$user->name}}</td>
                        <td>
                            @if($user->admin)
                                <a href="{{route('users.not.admin',['id'=>$user->id])}}" class="btn btn-danger">Remove Permition</a>
                                @else
                                <a href="{{route('users.admin',['id'=>$user->id])}}" class="btn btn-success">make admin</a>

                            @endif
                        </td>
                        @if(Auth::id()!== $user->id)
                            <td><a href="#"
                                   onclick="var result =confirm('are you want delete?');
                    if(result){
    event.preventDefault();
    document.getElementById('form-delete').submit();
}"

                                   class="btn btn-success">Delete</a>
                                <form id='form-delete' action="{{route('users.destroy',[$user->id])}}" method="post" style="display:none">
                                    <input type="hidden" name="_method" value="delete">
                                    {{ csrf_field() }}
                                </form>
                            </td>

                            @endif



                    </tr>

                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
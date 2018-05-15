@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">edit user</div>
        @if(count($errors)>0)
            <ul class="list-group">
                @foreach($errors->all() as $error)
                    <li class="list-group-item text-danger">
                        {{$error}}

                    </li>

                @endforeach

            </ul>

        @endif
        <div class="card-body">

            <form  action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Name:-</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="form-group">
                    <label>Email:-</label>
                    <input type="text" class="form-control" name="email">
                </div>


                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="add users">
                </div>
            </form>
        </div></div>
@endsection
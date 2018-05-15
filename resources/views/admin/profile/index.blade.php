@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">edit  profile</div>
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

            <form  action="{{route('profiles.update')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Name:-</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label>Email:-</label>
                    <input type="email" class="form-control" name="email" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label>Password:-</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label>Fetaures</label>
                    <input type="file" class="form-control" name="avater">
                </div>

                <div class="form-group">
                    <label>description</label>
                    <textarea class="form-control" rows="5" cols="5" name="about">
                    {{$user->profile->about}}
                    </textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="add posts">
                </div>
            </form>
        </div></div>
@endsection
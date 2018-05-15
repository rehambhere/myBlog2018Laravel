@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">create new categories</div>
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

            <form  method="post" action="{{route('categories.store')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Name:-</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="add categories">
                </div>
            </form>
        </div></div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">create new categories</div>
        @include('layouts.errors')
        <div class="card-body">

            <form  method="post" action="{{route('tags.update',[$tag->id])}}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="put">

                <div class="form-group">
                    <label>Name:-</label>
                    <input type="text" class="form-control" name="tags" value="{{$tag->tags}}">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Edit categories">
                </div>
            </form>
        </div></div>
@endsection
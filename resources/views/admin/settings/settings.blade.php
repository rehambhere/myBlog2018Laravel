@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">update settings</div>
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

            <form  method="post" action="{{route('settings.update')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Name:-</label>
                    <input type="text" class="form-control" name="site_name" value="{{$settings->site_name}}">
                </div>
                <div class="form-group">
                    <label>contactNum:-</label>
                    <input type="text" class="form-control" name="contact_num" value="{{$settings->contact_num}}">
                </div>
                <div class="form-group">
                    <label>contact_Email:-</label>
                    <input type="email" class="form-control" name="contact_email" value="{{$settings->contact_email}}">
                </div>
                <div class="form-group">
                    <label>Address:-</label>
                    <input type="text" class="form-control" name="address" value="{{$settings->address}}">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="add categories">
                </div>
            </form>
        </div></div>
@endsection
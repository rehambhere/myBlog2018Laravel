@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">edit  post</div>
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

            <form  action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Name:-</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label>Fetaures</label>
                    <input type="file" class="form-control" name="fetured">
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Selected  Tags</label>
                    @foreach($tags as $tag)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="tags[]" value="{{$tag->id}}">
                                {{$tag->tags}}
                            </label>
                        </div>


                        @endforeach
                </div>
                <div class="form-group">
                    <label>description</label>
                    <textarea class="form-control" id="summernote" rows="5" cols="5" name="description">

                    </textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="add posts">
                </div>
            </form>
        </div></div>
@endsection

@section('style')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
    @stop

@section('script')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>


    <script>
        $('#summernote').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 100
        });

    </script>
@stop
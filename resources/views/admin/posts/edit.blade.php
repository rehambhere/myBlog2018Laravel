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

            <form  action="{{route('posts.update',[$post->id])}}"  method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="put">
                <div class="form-group">
                    <label>Name:-</label>
                    <input type="text" class="form-control" name="name" value="{{$post->name}}">
                </div>
                <div class="form-group">
                    <label>Fetaures</label>
                    <input type="file" class="form-control" name="fetured">
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                    @if($post->category->id == $category->id)
                                        selected
                                        @endif
                            >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Selected  Tags</label>
                    @foreach($tags as $tag)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="tags[]" value="{{$tag->id}}"
                                       @foreach($post->tags as $t)
                                           @if($tag->id == $t->id)
                                               checked
                                               @endif
                                           @endforeach
                                >
                                {{$tag->tags}}
                            </label>
                        </div>


                    @endforeach
                </div>
                <div class="form-group">
                    <label>description</label>
                    <textarea class="form-control" rows="5" cols="5" name="description">
                        {{$post->description}}
                    </textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="add posts">
                </div>
            </form>
        </div></div>
@endsection
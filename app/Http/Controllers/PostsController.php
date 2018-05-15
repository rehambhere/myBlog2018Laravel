<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index')->with('posts',
            $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        if($categories->count()==0){
            Session::flash('info','you should add new catewgories');
            return redirect()->route('categories.create');
        }
        return view('admin.posts.create')
            ->with('categories',$categories)
            ->with('tags',$tags);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'fetured'=>'required|image',
            'category_id'=>'required',
            'tags'=>'required'


        ]);
        $fetured = $request->fetured;
        $fetured_new =time().$fetured->getClientOriginalName();
        $fetured->move('uploads/posts',$fetured_new);

  $post=  Post::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'fetured'=>'uploads/posts/'.$fetured_new,
            'category_id'=>$request->category_id,
             'slug'=>str_slug($request->name),


        ]);

    $post->tags()->attach($request->tags);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit')
            ->with('post',$post)
            ->with('categories',$categories)
            ->with('tags',$tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'category_id'=>'required',

        ]);
        $post = Post::find($id);


        if($request->hasFile('fetured')){
            $fetured = $request->fetured;
            $fetured_new =time().$fetured->getClientOriginalName();
            $fetured->move('uploads/posts',$fetured_new);
            $post->fetured= 'uploads/posts/'.$fetured_new;
        }

        $post->name = $request->name;
        $post->description= $request->description;
        $post->category_id= $request->category_id;
        $post->tags()->sync($request->tags);
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flash('success','succesfly trash post');
        return redirect()->back();

    }
}

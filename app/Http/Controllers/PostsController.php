<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>'index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(2);
        return view('Posts.index' )->with('posts',$posts);

    }

    /**Q
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Posts.create');
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
            'title'=>'required',
            'body'=>'required',
            'cover_image '=>'image|nullable||max:1999'
        ]);
        $fileNameToStore = null;
        if($request->hasFile('cover_image')){
            $file = $request->file('cover_image');
            $fileName = $file->getClientOriginalName();
            $fileNameToStore = time() .'_'.$fileName;
            $file->move('covers',$fileNameToStore);

        }else{
            $fileNameToStore = 'placeholder.jpg';

        }


        $post = new Post;
        $post->title =$request->title;
        $post->body =$request->body;
        $post->user_id =auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

//        Post::create($request->all());
        return redirect('/Posts/')->with('success',"Post Created");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts =   Post::findOrFail($id);
        return view('Posts.show')->with('posts',$posts);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::findOrFail($id);
        return view('Posts.edit' )->with('posts',$posts);
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
//        return $request->all();
        $posts = Post::findOrFail($id);
        $posts->title = $request->title;
        $posts->body = $request->body;


        $posts->save();
        return redirect('/Posts/')->with('success','Post Update');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::findOrFail($id);
        $posts->delete();
        return redirect('/Posts')->call('delete', "Post Deleted");
    }
}

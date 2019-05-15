<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get request to /posts is handled here
        // $posts = Post::all();
        // $posts = Post::orderBy('id', 'desc')->get();
        $posts = Post::orderBy('id', 'desc')->paginate(4);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required|min:4',
            'body'=>'required|min:5',
            'cover_image'=>'image|nullable|max:1999'
        ]);

        if($request->hasFile('cover_image')) {
            //Get full filename
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            //Extract filename only
            $filenameWithoutExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Extract extenstion only
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //Combine again with timestamp in the middle to differentiate files with same filename.
            $filenameToStore = $filenameWithoutExt . '_' . time() . '.' . $extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
        } else {
            $filenameToStore = 'noimage.jpg';
        }
        
        
        $post = new Post;
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $filenameToStore;
        $post->save();

        return redirect('/dashboard')->with('success', 'Post created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show individual posts
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //load the post to edit
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id) {
            return redirect()->back()->with('error', 'You can\'t access this page!');
        } else {
        return view('posts.edit')->with('post', $post);
        }
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
        //
        $this->validate($request, [
            'title'=>'required|min:4',
            'body'=>'required|min:5',
            'cover_image'=>'image|nullable|max:1999'
        ]);

        if($request->hasFile('cover_image')) {
            //Get full filename
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            //Extract filename only
            $filenameWithoutExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Extract extenstion only
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //Combine again with timestamp in the middle to differentiate files with same filename.
            $filenameToStore = $filenameWithoutExt . '_' . time() . '.' . $extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
        }

        $post = Post::find($id);
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        if($request->hasFile('cover_image')) {
            $post->cover_image = $filenameToStore;
        }
        $post->save();

        return redirect('/dashboard')->with('success', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete post
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'You can\'t access this page!');
        } else {
            $cover_image = $post->cover_image;
            if($cover_image != 'noimage.jpg') {
                Storage::delete('public/cover_images/' . $cover_image);
            }
            $post->delete();
            return redirect('/dashboard')->with('success', 'Post removed!');
        }
    }
}

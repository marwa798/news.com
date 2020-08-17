<?php

namespace App\Http\Controllers;

use Faker\Provider\File;
use Illuminate\Http\Request;
use App\posts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Tymon\JWTAuth\Contracts\Providers\Storage;

class postController extends Controller
{

    /**
     * postController constructor.
     */
    public function __construct()
    {
        //
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $posts = posts::all();
        $posts = posts::orderBy('id', 'DESC')->paginate(6);
        return view('pages.news', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'content' => 'required',
            'image' => 'nullable|image']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/postsImages', $file_name);

        } else {
            $file_name = 'placeholder.PNG';
        }

        $post = new posts();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = auth()->user()->id;
        $post->image = $file_name;
        $post->save();

        return redirect('/news')->with('status', 'post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(posts $post)
    {
//        $post = posts::find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = posts::find($id);

        if (auth()->user()->id !== $post->user_id) {
            return redirect('/news')->with('error', 'you are not authorised');
        }
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3',
            'content' => 'required'
        ]);

        $post = posts::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect('news')->with('status', 'post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        posts::find($id)->delete();
        return redirect('news')->with('status', 'post deleted successfully');

    }
}

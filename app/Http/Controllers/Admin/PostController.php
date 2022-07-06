<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $validated=$request->all();
        $validated['slug']=Str::slug($validated['name']);
        $validated['image'] = $this->initUpload($request->file('image'), 'posts');

        $post = Post::create($validated);

        if(!$post){
            return redirect()->back()->with('error','Post  not add successful');
        }

        return redirect(route('posts.index'))->with('success','Post add successful');


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
        $post = Post::findOrFail($id);

        return view('admin.posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->all();
        $validated['slug'] = Str::slug($validated['name']);

        if($request->hasFile('image')){
            $validated['image']=$this->initUpload($request->file('image'),'posts');
        }

        $post->update($validated);

        if(!$post){
            return redirect()->back()->with('error','Post not add successful');
        }

        return redirect(route('posts.index'))->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        File::delete(storage_path('app/public/posts/'.$post->image));

        $post->delete();

        return redirect(route('posts.index'))->with('success','Post deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts=About::all();
        return view('admin.abouts.index')->with('abouts',$abouts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AboutRequest $request)
    {
        $validated=$request->all();
        $validated['title'] = $request->title;
        $validated['description'] = $request->description;
        $validated['job'] = $request->job;
        $validated['text'] = $request->text;


        $about = About::create($validated);
        if(!$about){
            return redirect()->back()->with('error','About  not add successful');
        }

        return redirect(route('abouts.index'))->with('success','About add successful');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about =About::findOrFail($id);

        return view('admin.abouts.edit')->with('about', $about);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AboutRequest $request, $id)
    {
        $about = About::findOrFail($id);
        $validated['title'] = $request->title;
        $validated['description'] = $request->description;
        $validated['job'] = $request->job;
        $validated['text'] = $request->text;


        $about->update($validated);
        if(!$about){
            return redirect()->back()->with('error','About not update successful');
        }

        return redirect(route('abouts.index'))->with('success','About  update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::findOrFail($id);
        $about->delete();

        return redirect(route('abouts.index'))->with('success','About deleted successfully');
    }
}

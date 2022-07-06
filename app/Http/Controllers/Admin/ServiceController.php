<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.services.index')->with('services',Service::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {

        $validated = $request->all();
        $validated['slug'] = Str::slug($validated['name']);
        $validated['image'] = $this->initUpload($request->file('image'), 'services');

        $service = Service::create($validated);

        if(!$service){
            return redirect()->back()->with('error','Servis  not add successful');
        }

        return redirect(route('services.index'))->with('success','Servis add successful');
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
        $service = Service::findOrFail($id);

        return view('admin.services.edit')->with('service', $service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, $id)
    {
        $service = Service::findOrFail($id);

        $validated = $request->all();
        $validated['slug'] = Str::slug($validated['name']);

        if($request->hasFile('image')){
            $validated['image']=$this->initUpload($request->file('image'),'services');
        }

        $service->update($validated);

        if(!$service){
            return redirect()->back()->with('error','Servis  not add successful');
        }

        return redirect(route('services.index'))->with('success','Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        File::delete(storage_path('app/public/services/'.$service->image));

        $service->delete();

        return redirect(route('services.index'))->with('success','Service deleted successfully');
    }
}

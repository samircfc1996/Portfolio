<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoRequest;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortfolioPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {

        $portfolio_photos=Photo::where('portfolio_id',$id)->get();
      return view('admin.portfolio_photos.index')->with([
                     'portfolio_photos'=>$portfolio_photos,
                      'portfolio_id'=>$id
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $id)
    {
        return view('admin.portfolio_photos.create')->with('portfolio_id',$id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotoRequest $request,int $id)
    {
        foreach($request->photos as $photo){
            $portfolio_photo=$this->initUpload($photo,'portfolio_photos');

            Photo::create([
                'name'=>$portfolio_photo,
                'portfolio_id'=> $id
            ]);

        }
        return redirect(route('portfolios.photos.index',$id))->with('success','Successfull added');
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
    public function edit(int $portfolio_id,int $photo_id)
    {
        $photo=Photo::where([
            'portfolio_id'=>$portfolio_id,
            'id'=>$photo_id
        ])->firstOrFail();

        return view('admin.portfolio_photos.edit')->with('photo',$photo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhotoRequest $request, int $portfolio_id,int $photo_id)
    {
        $photo=Photo::where([
            'portfolio_id'=>$portfolio_id,
            'id'=>$photo_id
        ])->firstOrFail();

        if($request->hasFile('photo')){
            File::delete(storage_path('app/public/portfolio_photos/'.$photo->name));
            $photo_name=$this->initUpload($request->file('photo'),'portfolio_photos');
            $photo->update([
                'name'=>$photo_name,
                'portfolio_id'=>$portfolio_id

            ]);
        }
        return redirect(route('portfolios.photos.index',$portfolio_id))->with('success','Successfull updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $portfolio_id,int $photo_id)
    {
       $photo=Photo::where([
           'portfolio_id'=>$portfolio_id,
           'id'=>$photo_id,

       ])->firstOrFail();

       File::delete(storage_path('app/public/portfolio_photos/'.$photo->name));

       $photo->delete();

        return redirect(route('portfolios.photos.index',$portfolio_id))->with('success','Successfull deleted');

    }
}

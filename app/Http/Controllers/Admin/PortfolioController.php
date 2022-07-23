<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\PortfolioRequest;
use App\Models\Photo;
use App\Models\Portfolio;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.portfolios.index')->with('portfolios',Portfolio::with('category','photos')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolios.create')->with([
            'categories'=>Category::all(),
            'tags'=>Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioRequest $request)
    {
        $validated = $request->all();

        $validated['slug']=Str::slug($validated['name']);
        $validated['photo']=$this->initUpload($request->file('photo'), 'portfolios');
        $portfolio=Portfolio::create($validated);

        foreach($request->file('photos') as $photo){
            $portfolio_photo=$this->initUpload($photo,'portfolio_photos');
            Photo::create([
                'name'=>$portfolio_photo,
                'portfolio_id'=>$portfolio->id

            ]);
//            $portfolio->photos()->attach($photo_model->id);
        }


        if(!$portfolio){
            return redirect()->back()->with('error','Servis  not add successful');
        }

        return redirect(route('portfolios.index'))->with('success','Servis add successful');

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
        $portfolio=Portfolio::with('photos')->findOrFail($id);

        return view('admin.portfolios.edit')->with([
            'portfolio'=>$portfolio,
            'categories'=>Category::all()

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PortfolioRequest $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $validated = $request->all();
        $validated['slug'] = Str::slug($validated['name']);

        if($request->hasFile('photo')){
            $validated['photo']=$this->initUpload($request->file('photo'),'portfolios');
        }

        $portfolio->update($validated);

        if(!$portfolio){
            return redirect()->back()->with('error','Portfolio did  not add successful');
        }

        return redirect(route('portfolios.index'))->with('success','Portfolio updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        File::delete(storage_path('app/public/portfolios/'.$portfolio->photo));

        $portfolio->delete();

        return redirect(route('portfolios.index'))->with('success','Portfolio deleted successfully');
    }
}

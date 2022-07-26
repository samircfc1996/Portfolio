@extends('front.layouts.app')

@section('content')

    <div id="ww">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 centered">
                    <img src="{{asset('front/img/user.png')}}" alt="Stanley">
                    <h1>Hi, I am Stanley!</h1>
                    <p>Hello everybody. I'm Stanley, a free handsome bootstrap theme coded by BlackTie.co. A really simple theme for those wanting to showcase their work with a cute & clean style.</p>
                    <p>Please, consider to register to <a href="http://eepurl.com/IcgkX">our newsletter</a> to be updated with our latest themes and freebies. Like always, you can use this theme in any project freely. Share it with your friends.</p>

                </div>
            </div>
        </div>
    </div>


    <div class="container pt">
        <div class="row mt centered">
            @foreach($portfolios as $portfolio)
                <div class="col-lg-4">
                    <a class="zoom green" href="{{route('f_work_about',$portfolio->slug)}}"><img class="img-responsive" src="{{asset('storage/portfolios/'.$portfolio->photo)}}" alt="" /></a>
                    <p>{{$portfolio->name}}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection

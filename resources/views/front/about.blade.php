@extends('front.layouts.app')

@section('content')

    <div id="ww">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 centered">
                    @foreach($abouts as $about)
                    <img  width="10%" src="{{asset('front/img/samir.jpg')}}" alt="Stanley">
                    <h1>{{$about->title}}</h1>
                    <p>{{$about->description}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container pt">
        <div class="row mt centered">
            @foreach($abouts as $about)
            <div class="col-lg-3">
                <span class="glyphicon glyphicon-book"></span>
                <p>{{$about->job}}</p>
            </div>
            @endforeach
        </div>

            <div class="col-lg-6">
                <h4>Bacariqlar</h4>
                HTML
                <div class="progress">
                    <div class="progress-bar progress-bar-theme" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                        <span class="sr-only">60% Complete</span>
                    </div>
                </div>


            </div>
        </div>
    </div>


@endsection

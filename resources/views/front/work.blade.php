@extends('front.layouts.app')
@section('content')
    <div class="container pt">
        <div class="row mt">
            <div class="col-lg-6 col-lg-offset-3 centered">
                <h3>MY WORK</h3>
                <hr>
                <p>Show your work here. Dribbble shots from the awesome designer <a href="http://dribbble.com/wanderingbert">David Creighton-Pester</a>.</p>
            </div>
        </div>
        <div class="row mt centered">
         @foreach($portfolios  as $portfolio)
                <div class="col-lg-4">
                    <a class="zoom green" href="{{route('f_work_about',$portfolio->slug)}}"><img class="img-responsive" src="{{ asset('storage/portfolios/'.$portfolio->photo) }}" alt="" /></a>
                    <p>{{$portfolio->name}}</p>
                </div>
            @endforeach
        </div><!-- /row -->
    </div><!-- /container -->

@endsection

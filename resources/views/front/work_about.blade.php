@extends('front.layouts.app')

@section('content')
    <div class="container pt">
        <div class="row mt">
            <div class="col-lg-6 col-lg-offset-3 centered">
                <h3>{{$portfolio->name}}</h3>
                <hr>
            </div>
        </div>
        <div class="row mt centered">
            <div class="col-lg-8 col-lg-offset-2">
                @foreach($portfolio->photos as $photo)
                    <p><img class="img-responsive" width="100%" src="{{asset('storage/portfolio_photos/'.$photo->name)}}" alt=""></p>
                @endforeach
                <p><bt>Client: <a href="#">BlackTie.co</a></bt> - <bt>Type: <a href="#">Illustration</a></bt> - <bt>Date: <a href="#">January 2014</a></bt></p>
            </div>
        </div><!-- /row -->
    </div><!-- /container -->

@endsection

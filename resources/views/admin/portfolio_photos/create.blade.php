@extends('admin.layouts.app')
@section('content')
    <section class="content">

        @if(session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Portfolio Photo Add</h3>
                        </div>
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <span role="alert">
                                            <strong>{{ $error }}</strong>
                                          </span>
                            @endforeach
                        @endif
                        <div class="card-body">
                            <form action="{{route('portfolios.photos.store',$portfolio_id)}}"
                                  method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class ="mb-3">
                                    <label for="photo" class="form-label">Photo</label>
                                    <input type="file"  multiple name="photos[]" class="form-control" id="photo">
                                </div>

                                <button type="submit" class="btn btn-outline-success">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

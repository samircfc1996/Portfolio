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
                            <h3 class="card-title">Create About</h3>
                        </div>
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <span role="alert">
                                            <strong>{{ $error }}</strong>
                                          </span>
                            @endforeach
                        @endif
                        <div class="card-body">
                            <form action="{{route('abouts.store')}}"
                                  method="post">
                                @csrf
                                <div class ="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" value="{{ old('title') }}" name="title" class="form-control" id="title">
                                </div>
                            <div class ="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" value="{{ old('description') }}" name="description" class="form-control" id="description">
                            </div>
                                <div class ="mb-3">
                                    <label for="job" class="form-label">Job</label>
                                    <input type="text" value="{{ old('job') }}" name="job" class="form-control" id="job">
                                </div>
                                <div class ="mb-3">
                                    <label for="text" class="form-label">Text</label>
                                    <input type="text" value="{{ old('text') }}" name="text" class="form-control" id="text">
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

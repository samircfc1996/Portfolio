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
                            <h3 class="card-title">Portfolio Service</h3>
                        </div>
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <span role="alert">
                                            <strong>{{ $error }}</strong>
                                          </span>
                            @endforeach
                        @endif
                        <div class="card-body">
                            <form action="{{route('portfolios.store')}}"
                                  method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class ="mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select name="category_id" id="category">
                                        <option value="">-</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class ="mb-3">
                                    <label for="tags" class="form-label">Tag</label>
                                    <select name="tag_id[]" id="tags" multiple>
                                        <option value="">-</option>
                                        @foreach($tags as $tag)
                                            <option   value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class ="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="name">
                                </div>
                                <div class ="mb-3">
                                    <label for="photo" class="form-label">Photo</label>
                                    <input type="file" name="photo" class="form-control" id="photo">
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

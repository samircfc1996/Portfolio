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
                            <h3 class="card-title">Edit Portfolio-{{$portfolio->name}}</h3>
                        </div>
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <span role="alert">
                                            <strong>{{ $error }}</strong>
                                          </span>
                            @endforeach
                        @endif
                        <div class="card-body">
                            <form action="{{route('portfolios.update', $portfolio->id)}}"
                                  method="post"
                                  enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class ="mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select name="category_id" id="category" multiple>
                                        <option value="">-</option>
                                        @foreach($categories as $category)
                                            <option @if($portfolio->category_id===$category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class ="mb-3">
                                    <label for="name" class="form-label"> Name</label>
                                    <input type="text" value="{{ $portfolio->name }}" name="name" class="form-control" id="name">
                                </div>
                                <div class ="mb-3">
                                    <label for="image" class="form-label">Cover Photo</label>
                                    <img width="100" src="{{ asset('storage/portfolios/'.$portfolio->photo) }}" alt="">
                                </div>
                                <div class ="mb-3">
                                    <label for="image" class="form-label">New Cover Photo</label>
                                    <input type="file" name="photo" class="form-control" id="image">
                                </div>
                                <div class ="mb-3">
                                    <label for="image" class="form-label">Photo</label>
                                   @foreach($portfolio->photos as $photo)
                                        <img width="100" src="{{ asset('storage/portfolio_photos/'.$photo->name) }}" alt="">
                                    @endforeach
                                </div>
                                <div class ="mb-3">
                                    <label for="image" class="form-label">New Photos</label>
                                    <input type="file" name="photo" class="form-control" id="image">
                                </div>
                                <button type="submit" class="btn btn-outline-warning">Update</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

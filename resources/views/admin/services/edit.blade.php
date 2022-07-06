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
                            <h3 class="card-title">Edit Service</h3>
                        </div>
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <span role="alert">
                                            <strong>{{ $error }}</strong>
                                          </span>
                            @endforeach
                        @endif
                        <div class="card-body">
                            <form action="{{route('services.update', $service->id)}}"
                                  method="post"
                                  enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class ="mb-3">
                                    <label for="name" class="form-label">Service Name</label>
                                    <input type="text" value="{{ $service->name }}" name="name" class="form-control" id="name">
                                </div>
                                <div class ="mb-3">
                                    <label for="image" class="form-label">Photo</label>
                                    <img width="100" src="{{ asset('storage/services/'.$service->image) }}" alt="">
                                </div>
                                <div class ="mb-3">
                                    <label for="image" class="form-label">New Photo</label>
                                    <input type="file" name="image" class="form-control" id="image">
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

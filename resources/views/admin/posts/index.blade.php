@extends('admin.layouts.app')
@section('content')
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Post Page</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                            @endif
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td>{{$post->name}}</td>
                                        <td>{{$post->image}}</td>
                                        <td>{{$post->slug}}</td>
                                        <td>{{$post->desc}}</td>
                                        <td>
                                            <a href="{{route('posts.edit', $post->id)}} " class="btn btn-outline-danger" style="color:blue">
                                                <i class="fas fa-pencil-alt"></i>Edit
                                            </a>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" type="submit"> <i class="fas fa-trash-alt"></i> Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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

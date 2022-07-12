@extends('admin.layouts.app')
@section('content')
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Portfolio Page</h3>

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
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Tag</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($portfolios as $portfolio)
                                    <tr>
                                        <td>{{$portfolio->id}}</td>
                                        <td>
                                            <img  width="120" src="{{asset('storage/portfolios/'.$portfolio->photo) }}" alt="">
                                        </td>
                                        <td>{{$portfolio->name}}</td>
                                        <td>{{$portfolio->category->name}}</td>
                                        <td>
                                            @foreach($portfolio->tags as $tag)
                                                {{$tag->name.' '}}
                                            @endforeach
                                        </td>
                                        <td>

                                            <a href="{{route('portfolios.edit', $portfolio->id)}} " class="mr-2" style="color:blue">
                                                <i class="fas fa-edit"></i>Edit
                                            </a>
                                            <form action="{{ route('portfolios.destroy', $portfolio->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" type="submit"> <i class="fas fa-trash"></i> Delete</button>
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

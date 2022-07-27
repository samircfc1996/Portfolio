@extends('admin.layouts.app')
@section('content')
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Abouts Page</h3>

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
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Job</th>
                                    <th>Text</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($abouts as $about)
                                    <tr>
                                        <td>{{$about->id}}</td>
                                        <td>{{$about->title}}</td>
                                        <td>{{$about->description}}</td>
                                        <td>{{$about->job}}</td>
                                        <td>{{$about->text}}</td>
                                        <td>

                                            <a href="{{route('abouts.edit', $about->id)}} " class="mr-2" style="color:blue">
                                                <i class="fas fa-edit"></i>Edit
                                            </a>
                                            <form action="{{ route('abouts.destroy', $about->id) }}" method="post">
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
                </div>
            </div>
        </div>
    </section>
@endsection

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
                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default-{{$portfolio->id}}">
                                                <i class="fas fa-photo-video"></i>Photo
                                            </button>
                                            <a href="{{route('portfolios.edit', $portfolio->id)}} " class="mr-2" style="color:blue">
                                                <i class="fas fa-edit"></i>Edit
                                            </a>
                                            <form action="{{ route('portfolios.destroy', $portfolio->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" type="submit"> <i class="fas fa-trash"></i> Delete</button>
                                            </form>

                                        </td>
                                        <div class="modal fade" id="modal-default-{{$portfolio->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">{{$portfolio->name}}-photo</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <div class="container">
                                                         <div class="row">
                                                             @foreach($portfolio->photos as $photo)
                                                             <div class="col-md-4">
                                                                 <img width="150" src="{{asset('storage/portfolios/'.$photo->name) }}" alt="">
{{--                                                                 {{$photo->name}}--}}
                                                             </div>
                                                             @endforeach
                                                         </div>
                                                      </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

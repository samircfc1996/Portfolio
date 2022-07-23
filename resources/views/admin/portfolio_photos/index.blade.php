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

                            <div class="float-right mb-3">
                                <a href="{{route('portfolios.photos.create',$portfolio_id)}}" class="btn btn-primary">Add New Photos</a>
                            </div>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($portfolio_photos as $photo)
                                        <tr>
                                            <td>{{$photo->id}}</td>
                                            <td>
                                                <img  width="120" src="{{asset('storage/portfolio_photos/'.$photo->name) }}" alt="">
                                            </td>
                                            <td>{{$photo->name}}</td>
                                            <td>

                                                <a href="{{route('portfolios.photos.edit',[
                                                                 'portfolio'=>$portfolio_id,
                                                                  'photo'=>$photo->id]
                                                                  )}}"
                                                   class="mr-2" style="color:blue">
                                                    <i class="fas fa-edit"></i>Edit
                                                </a>

                                                <form action="{{route('portfolios.photos.destroy',[
                                                                      'portfolio'=>$portfolio_id,
                                                                       'photo'=>$photo->id])}}" method="post">
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

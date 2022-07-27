@extends('admin.layouts.app')
@section('content')
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Services Page</h3>

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
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                           @foreach($services as $service)
                               <tr>
                                   <td>{{$service->id}}</td>
                                   <td>{{$service->name}}</td>
                                   <td>{{$service->slug}}</td>
                                   <td>

                                      <a href="{{route('services.edit', $service->id)}} " class="mr-2" style="color:blue">
                                          <i class="fas fa-edit"></i>Edit
                                      </a>
                                       <form action="{{ route('services.destroy', $service->id) }}" method="post">
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

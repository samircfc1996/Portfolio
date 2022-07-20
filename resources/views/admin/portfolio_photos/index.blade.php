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
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <img  width="120" src="{{asset('storage/portfolios/') }}" alt="">
                                        </td>
                                        <td>test</td>
                                        <td>test</td>

                                        <td>

                                            <a  class="mr-2" style="color:blue">
                                                <i class="fas fa-edit"></i>Edit
                                            </a>
                                            <form action="" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" type="submit"> <i class="fas fa-trash"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
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

@extends('admin.master')
@section('title')
    Manage Brand
@endsection
@section('body')
    <div class="row pt-5">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Manage Brand</h3>
                </div>
                <div class="card-body">
                    <span class="text-success">{{Session::has('success') ? Session::get('success') : '' }}</span>
                    <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Brand Name</th>
                            <th>Brand Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$brand->name}}</td>
                            <td>{{$brand->status == 1? 'Published' : 'Unpublished'}}</td>
                            <td>
                                <a href="{{route('edit-brand', ['id' => $brand->id])}}" class="btn btn-primary btn-sm">
                                    Edit
                                </a>
                                <a href="{{route('delete-brand', ['id' => $brand->id])}}" onclick="return confirm('Are you sure to delete this Category!!!')" class="btn btn-danger btn-sm">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

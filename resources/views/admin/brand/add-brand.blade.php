@extends('admin.master')
@section('title')
    Add Brand
@endsection
@section('body')
    <div class="row py-5">
        <div class="col-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Add Brand</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('new-brand')}}" method="post">
                        <span class="text-success">{{Session::has('success') ? Session::get('success') : '' }}</span>
                        @csrf
                        <div class="row mt-2">
                            <label class="col-md-4" >Brand Name</label>
                            <div class="col-md-8">
                                <input type="text" name="name" class="form-control" />
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label class="col-md-4">Status</label>
                            <div class="col-md-8">
                                <label><input type="radio" name="status" value="1" checked> Published</label>
                                <label><input type="radio" name="status" value="0" checked> Unpublished</label>

                            </div>

                        </div>

                        <div class="row mt-2">
                            <label class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-warning" value="Add Brand">

                            </div>

                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
@endsection

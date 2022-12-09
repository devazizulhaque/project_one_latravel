@extends('admin.master')
@section('title')
    Edit Brand
@endsection
@section('body')
    <div class="row py-5">
        <div class="col-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Brand</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('update-brand', ['id' => $brand->id])}}" method="post">
                        @csrf
                        <div class="row mt-2">
                            <label class="col-md-4" >Brand Name</label>
                            <div class="col-md-8">
                                <input type="text" value="{{$brand->name}}" name="name" class="form-control" />
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label class="col-md-4">Status</label>
                            <div class="col-md-8">
                                <label><input type="radio" name="status" value="1" {{$brand->status == 1 ? 'checked' : '' }}> Published</label>
                                <label><input type="radio" name="status" value="0" {{$brand->status == 0 ? 'checked' : '' }}> Unpublished</label>

                            </div>

                        </div>

                        <div class="row mt-2">
                            <label class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-warning" value="Update Brand">

                            </div>

                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
@endsection

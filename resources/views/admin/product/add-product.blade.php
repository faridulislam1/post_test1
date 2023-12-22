@extends('admin.master')
@section('body')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 ">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header bg-danger">
                        <h3 class="text-center font-weight-light my-4">Add Post Form</h3>
                    </div>
                    <div class="card-body" style="margin-top: 4px";>
                        <form action="{{route('new.product')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <label for="TitleName">Title Name</label>
                                <input class="form-control" name="title" id="TitleName" type="text"/>

                            </div>

                            <div class="col-md-6 ">
                                <div class="form-floating mb-3">
                                    <label for="TitleName">Image</label>
                                    <!-- //<input type="file" name="image" id="inputImage"> -->
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>

                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button class="btn btn-primary">Submit</button></div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

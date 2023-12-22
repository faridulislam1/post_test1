@extends('admin.master')
@section('body')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
    <div class="container">
        <div class="row mt-3 justify-content-center">
            <div class="col-lg-7 ">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header bg-primary"><h3 class="text-center font-weight-light my-4">Edit Post Form</h3></div>
                    <div class="card-body">
                        <form action="{{route('update.product')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <div class="form-floating mb-3">
                                <input class="form-control" name="title"  value="{{$product ->title }}" id="productName" type="text"/>
                                <label for="productName">Title Name</label>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input type="file" name="image" class="form-control"  class="dropify"  id="input-file-now">
                                    <img src="{{ asset ($product->image)}}" class="img-fluid" style="width:80px;height:50px;border-radius:50%;" alt="">
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>

    <script type="text/javascript">
        $('.dropify').dropify();
    </script>


@endsection
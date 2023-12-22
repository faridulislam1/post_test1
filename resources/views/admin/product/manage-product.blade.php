@extends('admin.master')
@section('body')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"
          integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<br><br>
<div class="col-md-6">
    <div class="form-group">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text btn btn-primary text-white" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="start_date" placeholder="Start Date" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text btn btn-primary text-white" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="end_date" placeholder="End Date" readonly>
                        </div>
                    </div>
                </div>
                <div>
                    <button id="filter" class="btn btn-primary">Filter</button>
                    <button id="reset" class="btn btn-warning">Reset</button>
                </div>
            </div>
        </div>
</div>
</div>
                        <div class="card-body table-responsive">
                            <table class="table table-striped table-hover table-bordered"  id="dataTableExample">
                                <thead>
                                <tr>
                                    <th>sl</th>
                                    <th>Title Name</th>
                                    <th>Image</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1 @endphp
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$product->title}}</td>
                                        <td>
                                            <img src="{{ asset ($product->image)}}" class="img-fluid" style="width:80px;height:50px;border-radius:50%;" alt="">
                                        </td>
                                        <!-- <td>{{$product->created_at}}</td> -->
                                        <td>{{ \Carbon\Carbon::parse($product->created_at)->format('Y-m-d') }}</td>

                                        <td>{{$product->status == 1 ? 'Published' : 'Unpublished'}}</td>

                                        <td  class="btn-group">
                                            <a href="{{route('edit.product',['id'=>$product->id]) }}" class="btn btn-primary btn-sm mx-md-2 "><i class="fas fa-edit"></i></a>

                                            @if($product->status == 1)
                                                <a href="{{route('status.product',['id'=>$product->id]) }}" class="btn btn-warning btn-sm mx-1">Unpublished</a>
                                            @else
                                                <a href="{{route('status.product',['id'=>$product->id]) }}" class="btn btn-success btn-sm mx-1">Published</a>
                                            @endif
                                            <form action="{{route('delete.product')}}" method="post">
                                                @csrf
                                                <input type="hidden" value="{{$product->id}}" name="id">
                                                <button type="submit" class="btn btn-danger btn-sm mx-lg-2" onclick="return confirm('Are you sure Delete this !!')"><i class="fas fa-trash"></i></button>

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

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <!-- Datepicker -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- Datatables -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <!-- Momentjs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script>
        $(function() {
            $("#start_date").datepicker({
                "dateFormat": "yy-mm-dd"
            });
            $("#end_date").datepicker({
                "dateFormat": "yy-mm-dd"
            });
        });
        // Fetch records
        function fetch(start_date, end_date) {
            $.ajax({
                url: "{{ route('students/records') }}",
                type: "GEt",
                data: {
                    start_date: start_date,
                    end_date: end_date
                },
                dataType: "json",
                success: function(data) {
                    // Datatables
                    var i = 1;
                    $('#records').DataTable({
                        "data": data.students,
                        // responsive
                        "responsive": true,
                        "columns": [{
                            "data": "id",
                            "render": function(data, type, row, meta) {
                                return i++;
                            }
                        },
                            {
                                "data": "name"
                            },
                            {
                                "data": "standard",
                                "render": function(data, type, row, meta) {
                                    return `${row.standard}th Standard`;
                                }
                            },
                            {
                                "data": "percentage",
                                "render": function(data, type, row, meta) {
                                    return `${row.percentage}%`;
                                }
                            },
                            {
                                "data": "result"
                            },
                            {
                                "data": "created_at",
                                "render": function(data, type, row, meta) {
                                    return moment(row.created_at).format('DD-MM-YYYY');
                                }
                            }
                        ]
                    });
                }
            });
        }
        fetch();
        // Filter
        $(document).on("click", "#filter", function(e) {
            e.preventDefault();
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();
            if (start_date == "" || end_date == "") {
                alert("Both date required");
            } else {
                $('#records').DataTable().destroy();
                fetch(start_date, end_date);
            }
        });
        // Reset
        $(document).on("click", "#reset", function(e) {
            e.preventDefault();
            $("#start_date").val(''); // empty value
            $("#end_date").val('');
            $('#records').DataTable().destroy();
            fetch();
        });
    </script>



    </section>
@endsection

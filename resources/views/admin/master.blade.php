<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin-Dashboard</title>
    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/vendors/core/core.css">
    <!-- endinject -->
{{--    data tables--}}
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- end plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('backend') }}/assets/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/demo_1/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('backend') }}/assets/images/favicon.png" />

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css"> -->
</head>
<body>
<div class="main-wrapper">
    @include('admin.include.sidebar')

    <div class="page-wrapper">

        @include('admin.include.header')

         @yield('body')
        @include('admin.include.footer')

    </div>
</div>

<!-- core:js -->
<script src="{{ asset('backend') }}/assets/vendors/core/core.js"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<script src="{{ asset('backend') }}/assets/vendors/chartjs/Chart.min.js"></script>
<script src="{{ asset('backend') }}/assets/vendors/jquery.flot/jquery.flot.js"></script>
<script src="{{ asset('backend') }}/assets/vendors/jquery.flot/jquery.flot.resize.js"></script>
<script src="{{ asset('backend') }}/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('backend') }}/assets/vendors/apexcharts/apexcharts.min.js"></script>
<script src="{{ asset('backend') }}/assets/vendors/progressbar.js/progressbar.min.js"></script>
<!-- end plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('backend') }}/assets/vendors/feather-icons/feather.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/template.js"></script>
<!-- endinject -->
<!-- custom js for this page -->
<script src="{{ asset('backend') }}/assets/js/dashboard.js"></script>
<script src="{{ asset('backend') }}/assets/js/datepicker.js"></script>

<script src="{{ asset('backend') }}/assets/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="{{ asset('backend') }}/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="{{ asset('backend') }}/assets/js/data-table.js"></script>



@yield('footer_script')
<!-- end custom js for this page -->
</body>
</html>
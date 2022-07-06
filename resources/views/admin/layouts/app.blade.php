<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('vendors/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include('admin.layouts.navbar')

    @include('admin.layouts.sidebar')

   <div class="content-wrapper">
    @yield('content')
   </div>

    @include('admin.layouts.footer')
</div>
<!-- ./wrapper -->

<script src="{{ asset('vendors/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendors/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendors/dist/js/adminlte.min.js') }}"></script>
</body>
</html>

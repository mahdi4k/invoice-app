<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->


    <title>پنل ادمین</title>

    <link href="/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
    @yield('styles')
</head>

<body id="page-top">
<div id="wrapper">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

        @include('Admin.section.header')



        <!-- Begin Page Content -->
            <div style="direction: rtl" class="container-fluid text-right ">
                @yield('content')

            </div>

        </div>
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>راهکار های شرکت وب زاگرس</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
    </div>

    <!-- End of Main Content -->

    <!-- End of Content Wrapper -->



    @include('Admin.section.sidebar')

    @include('Admin.section.footer')
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>{{ Helper::settings()->name }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="#" name="description" />
  <meta content="#" name="author" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ asset('public/setting') }}/{{ Helper::settings()->favicon }}">
  <!-- <link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.ico') }}"> -->
  <!-- Daterangepicker css -->
  @include('layouts.headerscript')
  @yield('style')
</head>

<body>
  <!-- Begin page -->
  <div class="wrapper">



    @include('layouts.navbar')
    @include('layouts.sidebar')

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
      <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
          @yield('content')

        </div>
      </div>
      @include('layouts.footer')
    </div>
    <!-- END wrapper -->
    @include('layouts.theme_setting')
    @include('layouts.footerscript')
    @yield('script')
    <script>
      $(document).ready(function() {

        $('.logout').on('click', function(e) {
          e.preventDefault();
          $('#logout').submit();
        });

        @if(Session::has('message'))
        swal("Success!", "{{ Session::get('message') }}", "success")
        @endif
      });
    </script>
</body>

</html>
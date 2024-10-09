<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.ico" type="">
    <title>FreshCart - Dashboard</title>


    <link rel="stylesheet" href="{{ asset('back-end/css/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back-end/css/feather-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('back-end/css/simplebar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back-end/css/theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/progress.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastify.min.css') }}">
    <script src="{{ asset('js/custom.js') }}"></script>
</head>

<body>
    <div id="loader" class="LoadingOverlay d-none">
        <div class="Line-Progress">
            <div class="indeterminate"></div>
        </div>
    </div>
    <script>
        showLoader();
    </script>

    <x-back-end.layouts.nav> </x-back-end.layouts.nav>
    {{ $slot }}
</body>
<script src="{{ asset('back-end/js/jquery.min.js') }}"></script>
<script src="{{ asset('back-end/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('back-end/js/simplebar.min.js') }}"></script>
<script src="{{ asset('back-end/js/theme.min.js') }}"></script>
<script src="{{ asset('back-end/js/apexcharts.min.js') }}"></script>
<script src="{{ asset('back-end/js/chart.js') }}"></script>
<script src="{{ asset('back-end/js/quill.min.js') }}"></script>
<script src="{{ asset('back-end/js/editor.js') }}"></script>

<script src="{{ asset('js/axios.min.js') }}"></script>
<script src="{{ asset('js/config.js') }}"></script>
<script src="{{ asset('js/toastify.min.js') }}"></script>
<script>
    $(window).on('load', function() {
        hideLoader();
    });
</script>

</html>

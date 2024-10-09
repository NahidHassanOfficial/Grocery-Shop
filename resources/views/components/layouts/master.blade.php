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
    <title>FreshCart - Online Grocery Shopping Platform</title>


    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/feather-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/simplebar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tiny-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/prism-okaidia.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme.min.css') }}">

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
    {{ $slot }}
</body>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/axios.min.js') }}"></script>
<script src="{{ asset('js/toastify.min.js') }}"></script>
<script src="{{ asset('js/config.js') }}"></script>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/simplebar.min.js') }}"></script>
<script src="{{ asset('js/nouislider.min.js') }}"></script>
<script src="{{ asset('js/wNumb.min.js') }}"></script>
<script src="{{ asset('js/index.js') }}"></script>
<script src="{{ asset('js/prism.js') }}"></script>
<script src="{{ asset('js/prism-scss.min.js') }}"></script>
<script src="{{ asset('js/prism-toolbar.min.js') }}"></script>
<script src="{{ asset('js/prism-copy-to-clipboard.min.js') }}"></script>
<script src="{{ asset('js/tiny-slider.js') }}"></script>
<script src="{{ asset('js/dropzone.min.js') }}"></script>
<script src="{{ asset('js/flatpickr.min.js') }}"></script>
<script src="{{ asset('js/theme.min.js') }}"></script>


<script>
    $(window).on('load', function() {
        hideLoader();
    });
</script>

</html>

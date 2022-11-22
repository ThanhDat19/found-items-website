<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ !empty($title) ? $title : 'laravel' }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="/template/css/styles.css">
    <!-- Main CSS -->
    <link href="/template/admin/dist/css/main.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/template/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/template/admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/template/front/scripts/bootstrap/bootstrap.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="/template/front/scripts/ionicons/css/ionicons.min.css">
    <!-- Toast -->
    <link rel="stylesheet" href="/template/front/scripts/toast/jquery.toast.min.css">
    <!-- OwlCarousel -->
    <link rel="stylesheet" href="/template/front/scripts/owlcarousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/template/front/scripts/owlcarousel/dist/assets/owl.theme.default.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="/template/front/scripts/magnific-popup/dist/magnific-popup.css">
    <link rel="stylesheet" href="/template/front/scripts/sweetalert/dist/sweetalert.css">
    <!-- Custom style -->
    <link rel="stylesheet" href="/template/front/css/style.css">
    <link rel="stylesheet" href="/template/front/css/skins/all.css">
    <link rel="stylesheet" href="/template/front/css/demo.css">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <style>
        *{
            font-family: 'Roboto', sans-serif;
        }
        h1{
            font-family: 'Roboto', sans-serif;
        }
    </style>
    @yield('head')
</head>

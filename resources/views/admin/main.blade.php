<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.header');
    <style>
        .dataTables_length label{
            margin: 10px 10px;
        }
        .dataTables_length label select{
            border-radius: 5px !important;
            padding: 0 5px;
            margin: 0 4px;
        }
        .dataTables_filter {
            float: right;
        }

        .dataTables_filter label input {
            margin-right: 58px !important;
            border-radius: 5px !important;
            margin-left: 8px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('admin.partials.nav')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @include('admin.alert')
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- jquery validation -->
                            <div class="card card-primary mt-3">
                                <div class="card-header">
                                    <h3 class="card-title">{{ $title }}</small></h3>
                                </div>
                                @yield('contents')
                                <!-- /.card-header -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-6">

                        </div>
                        <!--/.col (right) -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        @include('admin.partials.side')

        @include('admin.partials.footer')
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    @include('admin.footer');
</body>

</html>

<!-- jQuery -->
<script src="/template/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
{{-- <script src="/template/admin/dist/js/adminlte.min.js"></script>
<script src="/template/admin/js/main.js"></script> --}}
<script src="/template/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="/template/admin/js/main.js"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- Admin --}}
<script src="{{ asset('template/assets/js/app.js') }}"></script>

<!-- Need: Apexcharts -->

<script>
    $(document).ready(function() {
        $("#content").summernote({
            tabsize: 2,
            height: 400
        });
        $('.dropdown-toggle').dropdown();
    });
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

{{-- <script src="{{ asset('template/assets/extensions/apexcharts/apexcharts.min.js') }}"></script> --}}
{{-- <script src="{{ asset('template/assets/js/pages/dashboard.js') }}"></script> --}}
@yield('footer')

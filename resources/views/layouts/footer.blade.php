
<script src="/template/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="/template/js/vendor/jquery.min.js" type="text/javascript"></script>
<script src="/template/js/vendor/popper.min.js" type="text/javascript"></script>
<script src="/template/js/vendor/bootstrap.min.js" type="text/javascript"></script>
<script src="/template/js/vendor/functions.js" type="text/javascript"></script>

<!-- JS -->
<script src="/template/front/js/jquery.js"></script>
<script src="/template/front/js/jquery.migrate.js"></script>
<script src="/template/front/scripts/bootstrap/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    var $target_end = $(".best-of-the-week");
</script>
<script src="/template/front/scripts/jquery-number/jquery.number.min.js"></script>
<script src="/template/front/scripts/owlcarousel/dist/owl.carousel.min.js"></script>
<script src="/template/front/scripts/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<script src="/template/front/scripts/easescroll/jquery.easeScroll.js"></script>
<script src="/template/front/scripts/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="/template/front/scripts/toast/jquery.toast.min.js"></script>
<script src="/template/front/js/demo.js"></script>
{{-- <script src="/template/front/js/e-magz.js"></script> --}}
<script src="/template/admin/js/main.js"></script>
<script>
    $(document).ready(function() {
        $("#content").summernote({
            tabsize: 2,
            height: 200
        });
        $('.dropdown-toggle').dropdown();
    });
</script>
@yield('footer')

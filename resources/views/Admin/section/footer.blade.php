<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/js/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/js/sb-admin-2.js"></script>
<script src="/js/bootstrap-select.js"></script>
<script>
    $('.file_input').change(function() {

        $('#imageName').html(this.files && this.files.length ? this.files[0].name.split('.')[0] : '');

    })
    $('.file_input1').change(function() {

        $('#imageName1').html(this.files && this.files.length ? this.files[0].name.split('.')[0] : '');

    })
</script>
@yield('scripts')
<!-- Page level plugins -->
<!--<script src="vendor/chart.js/Chart.min.js"></script>
-->
<!-- Page level custom scripts -->
<!--<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
-->

@yield('script')

{{--
@include('sweet::alert')--}}

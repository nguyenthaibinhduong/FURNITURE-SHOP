<!-- Bootstrap core JavaScript-->
<script  src="{{ asset('admins/vendor/jquery/jquery.min.js') }}"></script>
<script  src="{{ asset('admins/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script  src="{{ asset('admins/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script  src="{{ asset('admins/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script  src="{{ asset('admins/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script  src="{{ asset('admins/js/demo/chart-area-demo.js') }}"></script>
<script  src="{{ asset('admins/js/demo/chart-pie-demo.js') }}"></script>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
  var options = {
    filebrowserImageBrowseUrl: '/filemanager?type=Images',
    filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/filemanager?type=Files',
    filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='
  };
</script>
<script>
    CKEDITOR.replace('my-editor', options);
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
<script>
$('textarea.my-editor').ckeditor(options);
</script>
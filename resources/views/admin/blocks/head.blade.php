<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){
            window.scrollTo(0,1);
        }
</script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{ asset('admin/assets/css/style.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ asset('admin/assets/css/style-responsive.css') }}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{ asset('admin/assets/css/font.css') }}" type="text/css"/>
<link href="{{ asset('admin/assets/css/font-awesome.css') }}" rel="stylesheet"> 
<link rel="stylesheet" href="{{ asset('admin/assets/css/morris.css') }}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{ asset('admin/assets/css/monthly.css') }}">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{ asset('admin/assets/js/jquery2.0.3.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/raphael-min.js') }}"></script>
<script src="{{ asset('admin/assets/js/morris.js') }}"></script>
<script type="text/javascript">
    function confirmDelete() {
        if(window.confirm('Are you sure you want to delete')){
            return true;
        }
        return false;
    }
</script>
{{-- <script src="{{asset('admin/assets/plugins/ckeditor/ckeditor.js')}}"></script> --}}
@extends('layout.master')
@section('meta')
	<meta charset="utf-8"/>
	<title>{{Config::get("project.name")}}</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	@yield('meta_page')
@stop
@section('styles')
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('metronic/assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('metronic/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('metronic/assets/global/plugins/components-rounded.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('metronic/assets/global/plugins/select2/select2.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('metronic/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('metronic/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('metronic/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('metronic/assets/global/plugins/bootstrap-datepicker/css/datepicker.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('metronic/assets/global/plugins/bootstrap-toastr/toastr.min.css') }}"/>
	<!-- END PAGE LEVEL STYLES -->
	<!-- BEGIN THEME STYLES -->
	<link href="{{ asset('metronic/assets/global/css/components-rounded.css') }}" id="style_components" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('metronic/assets/global/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('metronic/assets/admin/layout/css/layout.css') }}" rel="stylesheet" type="text/css"/>
	<link id="style_color" href="{{ asset('metronic/assets/admin/layout/css/themes/darkblue.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('metronic/assets/admin/layout/css/custom.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('metronic/assets/admin/pages/css/login.css') }}" rel="stylesheet" type="text/css"/>
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico"/>

	@yield('styles_page')
@stop
<body class=" login">
        <div class="menu-toggler sidebar-toggler"></div>
        <!-- END SIDEBAR TOGGLER BUTTON -->
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.html">
                <img src="../assets/pages/img/logo-big.png" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="login" method="post">
               
                <h3 class="form-title font-green">Sign In</h3>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="alert alert-danger display-hide">
                    @if(Session::has('error'))
					<div class="alert-box success">
					  <h2>{{ Session::get('error') }}</h2>
					</div>
					@endif
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> 
                    <p class="errors">{{$errors->first('email')}}</p>
                    </div>
                	
					
                <div class="form-group">
                	
					
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" />
                    <p class="errors">{{$errors->first('password')}}</p>
                     </div>
                	
                <div class="form-actions">
                    <button type="submit" class="btn green uppercase">Login</button>
                   

                </div>
                
           </form>
            
        </div>
        
        @section('javascript')
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->
	<!--[if lt IE 9]>
	<script src="../../assets/global/plugins/respond.min.js"></script>
	<script src="../../assets/global/plugins/excanvas.min.js"></script> 
	<![endif]-->
	<script src="{{ asset('metronic/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('metronic/assets/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="{{ asset('metronic/assets/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('metronic/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('metronic/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('metronic/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('metronic/assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('metronic/assets/global/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('metronic/assets/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('metronic/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="{{ asset('metronic/assets/global/plugins/select2/select2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('metronic/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('metronic/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}"></script>
	<script type="text/javascript" src="{{ asset('metronic/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('metronic/assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('metronic/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
	<script type="text/javascript" src="{{ asset('metronic/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js') }}"></script>
	<script type="text/javascript" src="{{ asset('metronic/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}"></script>
	<script type="text/javascript" src="{{ asset('metronic/assets/global/plugins/ckeditor/ckeditor.js') }}"></script>
	<script type="text/javascript" src="{{ asset('metronic/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js') }}"></script>
	<script type="text/javascript" src="{{ asset('metronic/assets/global/plugins/bootstrap-markdown/lib/markdown.js') }}"></script>
	<script src="{{ asset('metronic/assets/global/plugins/bootstrap-toastr/toastr.min.js') }}"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="{{ asset('metronic/assets/global/scripts/metronic.js') }}" type="text/javascript"></script>
	<script src="{{ asset('metronic/assets/admin/layout/scripts/layout.js') }}" type="text/javascript"></script>
	<script src="{{ asset('metronic/assets/admin/layout/scripts/quick-sidebar.js') }}" type="text/javascript"></script>
	<script src="{{ asset('metronic/assets/admin/layout/scripts/demo.js') }}" type="text/javascript"></script>
	<script src="{{ asset('metronic/assets/admin/pages/scripts/login.js') }}" type="text/javascript"></script>
	<script src="{{ asset('metronic/assets/admin.js') }}"></script>
	<script>
		jQuery(document).ready(function() {
		   	Metronic.init(); // init metronic core components
			Layout.init(); // init current layout
			QuickSidebar.init(); // init quick sidebar
			Demo.init(); // init demo features

			var app = new App();
		   	app.notificationsInit("top-right");

		   	@if (Session::has('success'))
		   		toastr.success('{{ Session::get("success") }}');
		   	@endif

		   	@if (Session::has('error'))
		   		toastr.error('{{ Session::get("error") }}');
		   	@endif

		   	@if (Session::has('info'))
		   		toastr.info('{{ Session::get("info") }}');
		   	@endif

		   	@if (Session::has('warning'))
		   		toastr.warning('{{ Session::get("warning") }}');
		   	@endif


		});
	</script>

	@yield('javascript_page')
@stop
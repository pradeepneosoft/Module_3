<!DOCTYPE html>
<html>
<head>
@include('admin.layouts.head')	

	
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		@include('admin.layouts.header')
		@include('admin.layouts.sidebar')
		@yield('main_content')

		@include('admin.layouts.footer')

		
	</div>

</body>
</html>
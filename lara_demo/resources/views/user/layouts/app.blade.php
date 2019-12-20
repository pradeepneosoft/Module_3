<!DOCTYPE html>
<html>
<head>
@include('user.layouts.head')	

	
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		@include('user.layouts.header')
		@include('user.layouts.sidebar')
		@yield('main_content')

		@include('user.layouts.footer')

		
	</div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>COSY AIRCONDITIONERS</title>
    {{-- create a icon --}}
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    @include('user.blocks.head')
</head>
<body>
	<div class="super_container">

		<!-- Header -->
		@include('user.blocks.header')

		@yield('content')

	</div>

	@include('user.blocks.foot')
</body>

</html>

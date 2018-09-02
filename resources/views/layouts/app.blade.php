<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>Raleria</title>

	{{-- Styles --}}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.css">
</head>
<body>
	{{-- Topbar --}}
	@include('includes.topbar')
	<br>

	<div class="grid-container">
		@include('includes.messages')
		@yield('content')
	</div>
</body>
</html>
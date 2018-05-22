<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>{{ $title }}</title>
		<link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet'>
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">	
		<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">	
		<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
		


		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<script src="{{ asset('assets/js/jquery-1.11.3.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/js/ckeditor/ckeditor.js') }}"></script>		
		<script src="{{ asset('assets/js/bootstrap-filestyle.min.js') }}"></script>
	</head>

	<body>
		<header >
			@yield('header')
			
			@if(count($errors) > 0)
			  	<div class="alert alert-danger">
			  		<ul>
					  	@foreach($errors->all() as $error)
					  	<li>{{ $error }}</li>
					  	@endforeach
					</ul>
			  	</div>
			  @endif
			  
			  @if(session('status'))
			  	<div class="alert alert-success">
			  		{{ session('status') }}
			  	</div>
			  @endif
		</header>
		@yield('content')
	</body>
</html>
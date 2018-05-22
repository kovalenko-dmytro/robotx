@if(isset($menu))
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ route('home') }}">
				<img src="{{ asset('assets/img/logo.png') }}" alt="">				
				</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					@foreach($menu as $item)
						<li class="smooth-scroll"><a href="#{{ $item['alias'] }}">{{ $item['title'] }}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</nav>
@endif

@if(session('status'))
  	<div class="alert alert-success">
  		{{ session('status') }}
  	</div>
  @endif

@if(count($errors) > 0)
  	<div class="alert alert-danger">
  		<ul>
		  	@foreach($errors->all() as $error)
		  	<li>{{ $error }}</li>
		  	@endforeach
		</ul>
  	</div>
  @endif

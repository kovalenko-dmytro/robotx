@if(isset($pages) && is_object($pages))
	@foreach($pages as $page)
	@if($page->name == 'home')
		<section id="{{ $page->alias }}">
	<div class="overlay"></div>
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!--Indicator-->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
			<li data-target="#myCarousel" data-slide-to="3"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<div class="container">
					<div class="row">
						<div class="col-md-12 wow bounceInUp">
							<div class="home-text text-center">
								{!! $page->text !!}
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="container">
					<div class="row">
						<div class="col-md-12 wow bounceInUp">
							<div class="home-text text-center">
								{!! $page->text !!}
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="container">
					<div class="row">
						<div class="col-md-12 wow bounceInUp">
							<div class="home-text text-center">
								{!! $page->text !!}
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="container">
					<div class="row">
						<div class="col-md-12 wow bounceInUp">
							<div class="home-text text-center">
								{!! $page->text !!}
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</section>
	@endif
	
	@if($page->name == 'service')
		@if(isset($services))
			<!--SERVICES AREA-->
				<section id="{{ $page->alias }}">
					<div class="container">
						<div class="row">
							<div class="col-md-12  wow bounce">
								<div class="section-heading text-center text-uppercase  wow bounceInUp">
									{!! $page->text !!}
								</div>
							</div>
						</div>
					</div>
			
			<div class="container">
			<div class="row">
			@foreach($services as $service)
							<div class="col-sm-6 col-md-3  wow bounceIn">
								<div class="single-item text-center">
									<i class="fa {{ $service->icon }}"></i>
									<h4 class="text-uppercase">{{ $service->name }}</h4>
									{!! $service->description !!}
									<a href="{{ route('page', ['alias'=>$service->name]) }}" class="btn btn-red text-uppercase">more</a>
								</div>
							</div>						
				
			@endforeach
			</div>
			</div>
			</section>
		@endif
	@endif
	
	@if($page->name == 'team')
		@if(isset($peoples))
			<!--team section-->
			<section id="{{ $page->alias }}">
				<div class="container">
					<div class="section-heading text-center text-uppercase wow  wow bounceInRight">
						<h2>OUR <span>team</span></h2>
					</div>
					<div class="row  wow bounceInLeft">
						@foreach($peoples as $people)
						<div class="col-sm-6 col-md-3">
							<div class="single-team">								
								{!! Html::image('assets/img/' . $people->images) !!}
								<h3>{!! $people->name !!}</h3>

								<p>{!! $people->position !!}</p>

								<div class="member-social-icon text-center">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</div>

							</div>
						</div>
						@endforeach			
												
					</div>
					@if(isset($skilles))
					<div class="skill-heading text-center text-uppercase">
						<h3>skill</h3>
					</div>
					<div class="row">
						@foreach($skilles as $skill)
						<div class="wp-bar bar">
							<div class="col-sm-3 col-xs-3">
								<h4>{!! $skill->name !!}</h4>
							</div>
							<div class="col-sm-8 col-xs-8">
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="{!! $skill->rate !!}"
									     aria-valuemin="0" aria-valuemax="100" style="width:80%">
									</div>
								</div>
							</div>
							<div class="col-sm-1 col-xs-1">
								<h4>{!! $skill->rate !!}%</h4>
							</div>
						</div>
						@endforeach			
						
					</div>
					@endif
				</div>
			</section>
		@endif
	@endif
	
	
	@if($page->name == 'gallery')
		@if(isset($portfolios))
			<!--gallery area-->
			<section id="{{ $page->alias }}">
				<div class="container">
					<div class="row">
						<div class="col-sm-10 col-sm-offset-1">
							<div class="section-heading text-center text-uppercase  wow shake">
								{!! $page->text !!}								
							</div>
						</div>
					</div>
				</div>
				<div class="gallery-btn text-center text-uppercase">
				
				@if(isset($tags))
				<a href="#" class="active btn btn-trans" data-filter="*">ALL</a>
				@foreach($tags as $tag)					
					<a href="#" class="btn btn-trans" data-filter=".{{ $tag }}">{{ $tag }}</a>
				@endforeach					
				@endif	
					
				</div>
				<div class="container-fluid">
					<div class="row no-gutter">
						<div class="gellery-item text-center">
							@foreach($portfolios as $portfolio)
							<div class="single-gl {{ $portfolio->filter }} col-md-2 col-sm-3">								
								{!! Html::image('assets/img/' . $portfolio->images, $portfolio->name) !!}

								<div class="gl-overlay">
									<div class="caption">
										<a href="#" data-gallery="prettyPhoto"><i class="fa fa-search"></i></a>
										<a href="#"><i class="fa fa-expand"></i></a>
									</div>
								</div>
							</div>
							@endforeach							
						</div>
					</div>
				</div>
			</section>
		@endif
	@endif
	
	@if($page->name == 'price')
		@if(isset($prices))
			<!--our price area-->
			<section id="{{ $page->alias }}">
				<div class="container">
					<div class="section-heading text-center text-uppercase">
						{!! $page->text !!}
					</div>
					<div class="row">
					@foreach($prices as $price)
						<div class="col-sm-4">
							<div class="single-price text-center wow swing">
								<div class="price-top">
									<h3>{!! $price->name !!}</h3>
									<i class="fa {{ $price->icon }}"></i>

									<h1><sup>&#36;</sup>{!! $price->price !!}<sub>/month</sub></h1>
								</div>
								<div class="price-bottom">
									{!! $price->text !!}
									<a href="#" class="btn text-uppercase">SUBSCRIBE NOW</a>
								</div>
							</div>
						</div>
						@endforeach						
					</div>
				</div>
			</section>
		@endif
	@endif
	
	@if($page->name == 'news')
		@if(isset($news))
			<!--our news area-->
			<section id="{{ $page->alias }}">
				<div class="section-heading news-heading text-center text-uppercase wow swing">
					{!! $page->text !!}
				</div>
				<div class="container">
					<div class="row no-gutter">
						<div class="col-md-7 col-md-offset-1">

							<div class="latest-news">

								<h3>Latest News</h3>
								
								@foreach($news as $singleNew)
								@if($singleNew->id < 7 && $singleNew->id > 3)
								<div class="news-content">
								
									<div class="news-date">
										{!! $singleNew->created_at !!}

										<!--<h1>{!! $singleNew->created_at !!}</h1>-->
									</div>
									<div class="news-text">
										<h5>{!! $singleNew->name !!} </h5>

										{!! $singleNew->description !!}
										<i class="fa fa-eye"></i> <span>{!! $singleNew->look !!}</span>
										<i class="fa fa-comment"></i><span>{!! $singleNew->comment !!}</span>
									</div>
								</div>
								@endif
								@endforeach							
								
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="news-list">
							
							@foreach($news as $singleNew)
								<div class="single-news">
									<div class="list-date">
										{!! $singleNew->created_at !!}								
									</div>
									<div class="list-text">
										<a href="#"><h5>{!! $singleNew->name !!}</h5></a>

										<p>{!! $singleNew->description !!}</p>
										<i class="fa fa-eye"></i> <span>{!! $singleNew->look !!}</span>
										<i class="fa fa-comment"></i><span>{!! $singleNew->comment !!}</span>
									</div>
								</div>
								@endforeach
								

							</div>
						</div>
					</div>
				</div>
			</section>
		@endif
	@endif
	
	@if($page->name == 'contact')
		<!--contact heading-->
		<section id="{{ $page->alias }}">
			<div class="section-heading contact-heading text-center text-uppercase">
				{!! $page->text !!}
			</div>

			<div id="map">


			</div>
			<div id="map-overlay" class="text-left text-uppercase">
				<div class="container">
					<h2>+29 20 466 4241</h2>

					<h2>info@robotx.com</h2>
				</div>
			</div>
			<!-- contact massage-->
			<div class="contact-form">
				<div class="container">
					<div class="row">
						<form action="{{ route('home') }}" method="post">
						
						{{ csrf_field() }}
						
							<div class="col-sm-4">
								<label for="usr">Your Name</label>
								<input type="text" class="form-control" name="name" id="usr">
							</div>
							<div class="col-sm-4">
								<label for="email">Your Email</label>
								<input type="email" class="form-control" name="email" id="email">
							</div>
							<div class="col-sm-4">
								<label for="number">Your Number</label>
								<input type="number" class="form-control" name="number" id="number">
							</div>
							<div class="col-sm-12">
								<label for="massage">Your Message</label>
								<textarea class="form-control" rows="10" name="text" id="massage"></textarea>

								<button type="submit" class="btn red-btn"> SEND YOUR MESSAGE</button>
							</div>

						</form>
					</div>
				</div>
			</div>
		</section>
	@endif	
	
	
	@endforeach
@endif
		
	

<!-- footer-area-->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-sm-2 text-center">
				<a href=""><img src="{{ asset('assets/img/fo-logo.png') }}" alt="logo"></a>
			</div>
			<div class="col-sm-8">
				<div class="footer-p text-center">
					<p>© Copyright 2014 - 2015, All Rights Reserved, Designed by: www.designoatmeal.com</p>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="footer-social text-center">
					<a href=""><i class="fa fa-facebook"></i></a>
					<a href=""><i class="fa fa-twitter"></i></a>
					<a href=""><i class="fa fa-instagram"></i></a>
					<a href=""><i class="fa fa-google-plus"></i></a>
					<a href=""><i class="fa fa-rss"></i></a>
				</div>
			</div>
		</div>
	</div>
</footer>
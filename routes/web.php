<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

////////////ПОЛЬЗОВАТЕЛЬСКАЯ ГРУППА МАРШРУТОВ////////////////////
Route::group([], function(){
	
	//маршрут главной страницы match потому что есть форма т.е. требуется get и post
	Route::match(['get', 'post'], '/', ['uses'=>'IndexController@execute', 'as'=>'home']);	
	
	//маршрут страниц сайта. {alias} - обязательный параметр страницы
	Route::get('/page/{alias}', ['uses'=>'PageController@execute', 'as'=>'page']);
	
	//маршруты для аутентификации пользователя
	Route::Auth();
	
	
});

//////////////////АДМИНИСТРАТИВНАЯ ГРУППА МАРШРУТОВ//////////////////////
Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){
	
	//главная страница админовской части
	Route::get('/', function(){
		
		if(view()->exists('admin.index'))
		{
			$data = ['title' => 'Admin Panel'];
			return view('admin.index', $data);
		}
		
	});
	
	//////////////////манипуляции со страницаим//////////////////////
	Route::group(['prefix'=>'pages'], function(){
		
		//главная страница по управлению страницами. Список добавленых страниц в теблице  pages
		Route::get('/', ['uses'=>'PagesController@execute', 'as'=>'pages']);
		
		//admin/pages/add
		Route::match(['get', 'post'], '/add', ['uses'=>'PagesAddController@execute', 'as'=>'pagesAdd']);
		
		//редактирование страниц
		//  admin/pages/edit/pageparam
		Route::match(['get', 'post', 'delete'],  '/edit/{page}', ['uses'=>'PagesEditController@execute', 'as'=>'pagesEdit']);
	});
	
	//////////////////манипуляции с сервисами/////////////////////
	// admin/services
	Route::group(['prefix'=>'services'], function(){
		
		//главная страница по управлению services. Список добавленых service в теблице  services
		Route::get('/', ['uses'=>'ServiceController@execute', 'as'=>'service']);
		
		//admin/services/add
		Route::match(['get', 'post'], '/add', ['uses'=>'ServiceAddController@execute', 'as'=>'serviceAdd']);
		
		//редактирование страниц
		//  admin/services/edit/serviceparam
		Route::match(['get', 'post', 'delete'],  '/edit/{service}', ['uses'=>'ServiceEditController@execute', 'as'=>'serviceEdit']);
	});
	
	//////////////////манипуляции с командой и людьми/////////////////////
	// admin/peoples
	Route::group(['prefix'=>'peoples'], function(){
		
		//главная страница по управлению peoples. Список добавленых people в теблице  peoples
		Route::get('/', ['uses'=>'PeopleController@execute', 'as'=>'people']);
		
		//admin/peoples/add
		Route::match(['get', 'post'], '/add', ['uses'=>'PeopleAddController@execute', 'as'=>'peopleAdd']);
		
		//редактирование 
		//  admin/peoples/edit/peopleparam
		Route::match(['get', 'post', 'delete'],  '/edit/{people}', ['uses'=>'PeopleEditController@execute', 'as'=>'peopleEdit']);
	});
	
	//////////////////манипуляции с навыками/////////////////////
	// admin/skilles
	Route::group(['prefix'=>'skilles'], function(){
		
		//главная страница по управлению skilles. Список добавленых skilles в теблице  skilles
		Route::get('/', ['uses'=>'SkillController@execute', 'as'=>'skill']);
		
		//admin/skilles/add
		Route::match(['get', 'post'], '/add', ['uses'=>'SkillAddController@execute', 'as'=>'skillAdd']);
		
		//редактирование 
		//  admin/skilles/edit/skillparam
		Route::match(['get', 'post', 'delete'],  '/edit/{skill}', ['uses'=>'SkillEditController@execute', 'as'=>'skillEdit']);
	});
	
	//////////////////манипуляции с портфолио/////////////////////
	// admin/portfolios
	Route::group(['prefix'=>'portfolios'], function(){
		
		//главная страница по управлению portfolio. Список добавленых portfolio в теблице  portfolios
		Route::get('/', ['uses'=>'PotfolioController@execute', 'as'=>'portfolio']);
		
		//admin/portfolios/add
		Route::match(['get', 'post'], '/add', ['uses'=>'PotfolioAddController@execute', 'as'=>'portfolioAdd']);
		
		//редактирование страниц
		//  admin/portfolios/edit/portfolioparam
		Route::match(['get', 'post', 'delete'],  '/edit/{portfolio}', ['uses'=>'PotfolioEditController@execute', 'as'=>'portfolioEdit']);
	});
	
	//////////////////манипуляции с прайс-листом/////////////////////
	// admin/prices
	Route::group(['prefix'=>'prices'], function(){
		
		//главная страница по управлению prices. Список добавленых prices в теблице  prices
		Route::get('/', ['uses'=>'PriceController@execute', 'as'=>'price']);
		
		//admin/prices/add
		Route::match(['get', 'post'], '/add', ['uses'=>'PriceAddController@execute', 'as'=>'priceAdd']);
		
		//редактирование 
		//  admin/prices/edit/priceparam
		Route::match(['get', 'post', 'delete'],  '/edit/{price}', ['uses'=>'PriceEditController@execute', 'as'=>'priceEdit']);
	});
	
	//////////////////манипуляции с новостями/////////////////////
	// admin/news
	Route::group(['prefix'=>'news'], function(){
		
		//главная страница по управлению news. Список добавленых news в теблице  news
		Route::get('/', ['uses'=>'NewsController@execute', 'as'=>'news']);
		
		//admin/news/add
		Route::match(['get', 'post'], '/add', ['uses'=>'NewsAddController@execute', 'as'=>'newsAdd']);
		
		//редактирование 
		//  admin/news/edit/newsparam
		Route::match(['get', 'post', 'delete'],  '/edit/{news}', ['uses'=>'NewsEditController@execute', 'as'=>'newsEdit']);
	});
	
		
});
Auth::routes();

Route::get('/home', 'HomeController@index');

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;
use App\Service;
use App\People;
use App\Skill;
use App\Portfolio;
use App\Price;
use App\News;

use DB;
use Mail;

class IndexController extends Controller
{
    //    
        
    public function execute(Request $request)
    {
    	
    	if($request->isMethod('post'))
    	{
			
			$messages = [
							'required'=>'Поле :attribute обязательно к заполнению',
							'email'=>'Поле :attribute должно соответствовать электронной почте',
							'digits'=>'Поле :attribute должно быть числом в пределах от 1 до 100'
							];
			
			$this->validate($request, [
										'name'=>'required|max:255',
										'email'=>'required|email',
										'number'=>'required|digits_between:1,100',
										'text'=>'required'
										], $messages);
			
			
			$data = $request->all();
			
			$result = Mail::send('site.email', ['data'=>$data], function($message) use($data){
				
				$mail_admin = env('MAIL_ADMIN');
				
				$message->from($data['email'], $data['name']);
				$message->to($mail_admin, 'Mr. Dima')->subject('Question');
			});
			
			if($result)
			{
				return redirect()->route('home')->with('status', 'email is send');
			}
		}
    	
    	
		$pages = Page::all();
	    $services = Service::where('id', '<', 5)->get();
	    $peoples = People::take(4)->get();
	    $skilles = Skill::all();
	    $portfolios = Portfolio::where('id', '<', 11)->get();
	    $prices = Price::where('id', '<', 4)->get();
	    
	    //$lastNews = News::where('id', '<', 4)->get();
	    $news = News::where('id', '<', 7)->get();
	    
	    //dd($sixNews);
	    
	    $tags = DB::table('portfolios')->distinct()->pluck('filter');
	    //dd($tags);
	    
	    $menu = [];
	    foreach($pages as $page)
	    {
			$item = ['title'=>$page->name, 'alias'=>$page->alias];
			array_push($menu, $item);
		}
		
		//dd($menu);
		
		return view('site.index', [
									'menu'=>$menu,
									'pages'=>$pages,
									'services'=>$services,
									'peoples'=>$peoples,
									'skilles'=>$skilles,
									'portfolios'=>$portfolios,
									'prices'=>$prices,	
									'news'=>$news,
									'tags'=>$tags
									]);
	}
}

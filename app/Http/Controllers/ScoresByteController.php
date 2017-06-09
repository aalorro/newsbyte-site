<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ScoresByteController extends Controller
{ 
	
	    
	public $country,$news,$native;

	public function scores($country,$region){
		$data = array();
		$arrDate = [];
		$finalScores = [];
		$scoresJson = storage_path('json/scores_'.$region.'.json');
		$file = file_get_contents($scoresJson);
		$scoresCollection = collect(json_decode($file,true));
		$scoresCountry = $scoresCollection->where('country',$country)->sortByDesc('date');
		foreach ($scoresCountry as $key => $pub) {
                $arrDate['item_id'] = $pub['item_id'];
                $arrDate['source'] = $pub['source'];
                $arrDate['link'] = $pub['link'];
                $arrDate['region'] = $pub['region'];
                $arrDate['country'] = $pub['country'];
                $arrDate['sport'] = $pub['sport'];
                $orig = strtotime($pub['date']);
                $arrDate['team1'] = $pub['team1'];
                $arrDate['score1'] = $pub['score1'];
                $arrDate['team2'] = $pub['team2'];
                $arrDate['score2'] = $pub['score2'];

			if(str_contains($orig,'/')){
				$date = date_create($orig);
				if($date instanceof \DateTime) {
					$pub = $date->format('Y-m-d h:i:s');
				} else {
					$pub = date('Y-m-d h:i:s',strtotime(str_replace('/', '-', $orig)));
				}
				$pub = $pub;
            } else {
            	$date = date_create();
            	 
				 if($orig != ''){
					$pub = date_timestamp_set($date, $orig);
				 }
				 
				 $pub = date_format($date, 'Y-m-d h:i:s A');
            }  
           	$arrDate['date'] = $pub;
            array_push($finalScores, $arrDate);
		}
		$sorted = collect($finalScores);
		$this->data['scores'] = $this->data['collection'] = $sorted;
		$this->data['sports'] = $this->data['collection']->unique('sport')->where('country', $country);
		return $this->data;
	}

	public function ago($time)
	{
		$periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
		$lengths = array("60","60","24","7","4.35","12","10");
	
		$now = time();
	
		$difference     = $now - $time;
		$tense         = "ago";
	
		for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
			$difference /= $lengths[$j];
		}
	
		$difference = round($difference);
	
		if($difference != 1) {
			$periods[$j].= "s";
		}
	
		return "$difference $periods[$j] ago";
	}


	public function index($region,$country,$lang = null){	
		//dd($country,$reg);
		$this->data['region'] = $region;	
		if(\Input::get('nav') == null){
			$this->data['country'] = $country;

		}else{
			$this->data['country'] = \Input::get('nav');
			$country = \Input::get('nav');
		}

			$this->scores($country,$region);
		return view('scoresbyte.scores', $this->data);
	}

	public function article($region,$country,$id,$lang=null){
			$this->news($country,$region);
			$this->data['region'] = $region;
			$article = $this->data['collection']->where('item_id',$id);
			$this->data['article'] = $article;
				if($lang != null){
					$this->data['native'] = $lang;
				}

				if($this->data['collection']->where('language',$this->data['native'])->count() <= 4){
					$this->data['related'] = $this->data['collection']->where('language',$this->data['native'])->all();
				}else{
					$this->data['related'] = $this->data['collection']->where('language',$this->data['native'])->random(5);
				}
			
			//dd($sample);
			//return "sample";
		return view('news.preview',$this->data);
	}

	public function sport($region, $country, $sport){
		#---------
			$this->data['selectedSport'] = $sport;
			$this->scores($country, $region);
			$this->data['region'] = $region;

			$this->data['scores'] =  $this->data['collection']->where('sport', $sport);
			$this->data['country'] = $country;
			return view('scoresbyte.scores',$this->data);
		#--------------
	}

	public function searchNews($region,$country){
		$this->news($country,$region);
		$this->data['region'] = $region;
		$key = \Input::get('key');
		$ids = [];
		$result = [];
			$jsonNews = $this->data['collection']->unique('title');
			$news = $jsonNews->values()->all();
					foreach ($news as $keys => $value) {
						//$value['title'];
						$has_news = str_contains($value['title'],$key);
						if(stripos($value['title'],$key) || stripos($value['article'],$key)){
						 	$ids['item_id'] = $value['item_id'];
						 	$ids['description'] = preg_replace("/\w*?$key\w*/i", "<strong class='lightup'>$key</strong>", $value['description']);
						 	$ids['title'] = preg_replace("/\w*?$key\w*/i", "<strong class='lightup'>$key</strong>", $value['title']);//$value['title'];
						 	$ids['pubdate'] = $value['pubdate'];
						 	$ids['source'] = $value['source'];
						 	$ids['language'] = $value['language'];
                            if(isset($ids['thumbnail'])) {
                            	$ids['thumbnail'] = $value['thumbnail'];
                            } else {
                            	$ids['thumbnail'] = '';
                            }
						 	//echo $value['item_id'].'<br/>';
						 	array_push($result, $ids);
						}
					}
				$this->data['country'] = $country;
				$this->data['result'] = collect($result);
			//dd($this->data);
		return view('news.search',$this->data);
	}

	public function navCountry(){
		$var = explode('/',  \Input::get('nav'));
		$region = $var[0];
		$country = $var[1];
		$this->news($country,$region);
		$this->data['country'] = $country;
		$this->data['region'] = $region;
		//dd($this->data);
		return view('news.news',$this->data);
	}

	public function contact(){
		//$captcha_res =  \Input::get('g-recaptcha-response');
		//$json = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=6Lc-rhITAAAAAEDPyquGVK58IuRYT0fc1yJ0htWK&response='.$captcha_res), true);
		
		//if($json['success'] != true){
		//	$error = 'Invalid Captcha';
	    //	return view('contact')->with('error',$error);
		//}else{
		if(\Input::get('email') == null || \Input::get('email') == '' || \Input::get('name') == null || \Input::get('name') == '' || \Input::get('contact_message') == null || \Input::get('contact_message') == ''){
			return view('contact')->with('error','Some field required.');
		}else{
			$email =  \Input::get('email');
			$name =  \Input::get('name');
			$contact =  \Input::get('c_number');
			$comment =  \Input::get('contact_message');
			$data = array('name'=>$name,'email'=>$email,'contact'=>$contact,'comment'=>$comment);
			Mail::send('contact_view',$data , function($message){
	        	$message->to('info@incubixtech.com', 'name')->subject('Newsbyte Contact Us!');
	    	});
	    	$success = 'Message sent successful';
	    	return view('contact')->with('success',$success);
		}
	}

}

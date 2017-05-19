<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ByteController extends Controller
{ 
	
	    
	public $country,$news,$native;

	public function news($country,$region){
				$data = array();
				$arrDate = [];
				$finalNews = [];
				
				$newsjson = storage_path('json/'.$region.'.json');
					$file = file_get_contents($newsjson);
					$newsCollection = collect(json_decode($file,true));
					$newsCountry = $newsCollection->unique('title')->where('country',$country)->sortByDesc('pubdate');
					//dd($newsCountry);		
							foreach ($newsCountry as $key => $pub) {
							
									#$pub['pubdate'] = '';

									$arrDate['title'] = $pub['title'];
	                                $arrDate['region'] = $pub['region'];
	                                $arrDate['source'] = $pub['source'];
	                                $arrDate['country'] = $pub['country'];
	                                $arrDate['language'] = $pub['language'];
	                                $arrDate['description'] = $pub['description'];
	                                $arrDate['item_id'] = $pub['item_id'];
	                                $arrDate['article'] = $pub['article'];
	                                $arrDate['link'] = $pub['link'];
	                                if(isset($pub['thumbnail'])) {
	                                	$arrDate['thumbnail'] = $pub['thumbnail'];
	                                } else {
	                                	$arrDate['thumbnail'] = '';
	                                }
	                               //dd($pub['pubdate']);
	                                //$arrDate['pubdate'] = date_format(date_create($pub['pubdate']), "Y-m-d h:i:s A");
	                                $orig = (isset($pub['pubdate']) ? $pub['pubdate'] : $pub['pubdate'] = strtotime(date("Y-m-d h:i:s A")));
									//echo $orig.'-'.$pub['country'].'<br/>';
								#-------------------
								if(str_contains($orig,'/')){
											//$pub = $pub['pubdate'];
											//echo "raw - ".$pub['pubdate'].'<br/>';
										 $date = date_create($orig);
										
										//echo $date['date'];
											if($date instanceof \DateTime){
												$pub = $date->format('Y-m-d h:i:s');
												//echo $pub.' if <br/>';
											}else{
												//$date = DateTime($pub['pubdate']);
												$pub = date('Y-m-d h:i:s',strtotime(str_replace('/', '-', $orig)));//$date->format('Y-m-d h:i:s');
												//echo $pub.' else <br/>';
												//$pub = $pub['pubdate'].'Y<br/>';
											}
										//echo $pub.' in if <br/>';
										 $pub = $pub;//date_format($pub, 'Y-m-d h:i:s');
                                    }else{
                                    	$date = date_create();
                                    	 
										 if($orig != ''){
											$pub = date_timestamp_set($date,$orig);
										 }
										 
										 $pub = date_format($date, 'Y-m-d h:i:s A');
										 //echo $pub.' -or='.$orig.' unix <br/>';
                                       //$pub = date_format(date_create($pub['pubdate']), "Y-m-d h:i:s A");//$pub['pubdate'];//\Carbon\Carbon::createFromTimeStamp($pub['pubdate'])->diffForHumans();
                                    }  
                               	 $arrDate['pubdate'] = $this->ago(strtotime($pub));//$pub['pubdate'];//date('m/d/Y',$pub);
                               	#-----------------------*/
                              	//echo $pub.'  -  '.$arrDate['title'].'<br/>';
                                array_push($finalNews, $arrDate);
							}
						//dd($finalNews);
							
						#----------------
				$sorted = collect($finalNews);//$newsCountry->where('country',$country)->sortByDesc('pubdate');
				//$sorted = $sorted->sortByDesc('pubdate');
				$this->data['news'] = $this->data['collection'] = $sorted;
						//dd($sorted);
				$this->data['languages'] = $this->data['collection']->unique('language')->where('country',$country);
				#-------------------
				//dd($this->data);
						//$native = [];
						//$lang = [];
				$this->data['eng'] = '';
	
				//*********PALESTINE********************
				if($country == 'Algeria' || $country == 'Morocco'){
						$this->data['languages'] = $this->data['collection']->unique('language')->where('country',$country);
							if($this->data['languages']->count() == 2){
								foreach ($this->data['languages'] as $key => $value) {
									if($value['language'] == 'Arabic'){
										$this->data['native'] = 'Arabic';
										
									}else{
										$this->data['eng'] = $value['language'];
									}
								}
							}else{
								foreach ($this->data['languages'] as $key => $value) {
									$this->data['native'] = $value['language'];
								}
								//echo "SOME";
							}
						//$this->data['news'] = $this->data['news']->where('language','French');
							$this->data['news'] = $this->data['news']->where('language',$this->data['native']);
							//dd($this->data);
					return $this->data;
				}

						//*************PALESTINE****************
				if($this->data['languages']->count() == 2){
					foreach ($this->data['languages'] as $key => $value) {
						if($value['language'] != 'English'){
							$native = $value['language'];
							$this->data['native'] = $native;
							$this->data['selectedlang'] = $native;
							$this->data['news'] = $this->data['news']->where('language',$native);
								//return $this->data['languages'];
						}else{
							$eng = 'English';
							$this->data['eng'] = $eng;
				
						}
					}
				}else {
					//dd($this->data['languages']);
					foreach ($this->data['languages'] as $key => $value) {
						
						//dd($value['language']);
						if($value['language'] == 'English'){
							//$native = $value['language'];
							
							$this->data['native'] = $value['language'];
							$this->data['selectedlang'] = $value['language'];
							$this->data['news'] = $this->data['news']->where('language',$value['language']);
							//$this->data['eng'] = $value['language'];

						}else{
							$this->data['native'] = $value['language'];
							$this->data['selectedlang'] = $value['language'];
							$this->data['news'] = $this->data['news']->where('language',$value['language']);
		
						}
					}
					
				}
					
				//$this->data['eng'] = $english;
				#-------------------
				//dd($this->data['news'] = $this->data['news']->where('language',$this->data['native']));
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

			$this->news($country,$region);
			//dd($this->data);
			
			if(!array_key_exists('native', $this->data)){
				$this->data['native'] = "No news found.";
			}

			$this->data['news'] =  $this->data['news']->where('language',$this->data['native']);		
			//$this->data['x'] = $this->data['collection']->sortBy('pubdate')->toArray();
			//dd($this->data);
		return view('news.news',$this->data);
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

	public function lang($region,$country, $lang){
		#---------
			$this->data['selectedlang'] = $lang;
			$this->news($country,$region);
			$this->data['region'] = $region;
			/*foreach ($this->data['languages'] as $key => $value) {
						if($value['language'] != 'English'){
							$native = $value['language'];
						}else{
							$native = 'English';
						}
					}*/
				/*if($this->data['languages']->count() == 2){
								foreach ($this->data['languages'] as $key => $value) {
									if($value['language'] != 'English'){
										$native = $value['language'];
										$this->data['native'] = $native;
											$this->data['news'] = $this->data['news']->where('language',$native);
									}else{
										$eng = 'English';
										$this->data['eng'] = $eng;
									}
								}
							}else{
								if($this->data['languages'] != 'English'){
									$native = $this->data['languages'];
									$this->data['native'] = $native;
										$this->data['news'] = $this->data['news']->where('language',$native);
								}else{
									$eng = $this->data['languages'];
									$this->data['eng'] = $eng;
										$this->data['news'] = $this->data['news']->where('language',$eng);

								}
							}*/

			$this->data['news'] =  $this->data['collection']->where('language',$lang);
			//$this->data['native'] = $lang;
			$this->data['country'] = $country;
			//dd($this->data);
			return view('news.news',$this->data);
			//$this->data['news'] = $this->
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

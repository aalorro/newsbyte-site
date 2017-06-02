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
		$scoresJson = realpath(__DIR__ . '/../../../storage/json/scores_'.$region.'.json');
		$file = file_get_contents($scoresJson, true);
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


	public function index($region,$country,$sports = null){
		$this->data['region'] = $region;	
		if(\Input::get('nav') == null) {
			$this->data['country'] = $country;

		} else {
			$this->data['country'] = \Input::get('nav');
			$country = \Input::get('nav');
		}

		$this->scores($country,$region);
		if($this->data['sports']->count() > 0) {
			$sports = $this->data['sports'];
			$sport = $sports[0]['sport'];
			$this->data['selectedSport'] = $sport;
			$this->data['scores'] =  $this->data['collection']->where('sport', $sport);
		}
		return view('scoresbyte.scores', $this->data);
	}

	public function sport($region, $country, $sport){
			$this->data['selectedSport'] = $sport;
			$this->scores($country, $region);
			$this->data['region'] = $region;
			$this->data['country'] = $country;
			$this->data['scores'] =  $this->data['collection']->where('sport', $sport);
			return view('scoresbyte.scores',$this->data);
	}

	public function navCountry(){
		$var = explode('/',  \Input::get('nav'));
		$region = $var[0];
		$country = $var[1];
		$this->data['country'] = $country;
		$this->data['region'] = $region;
		$this->scores($country,$region);
		if($this->data['sports']->count() > 0) {
			$sports = $this->data['sports'];
			$sport = $sports[0]['sport'];
			$this->data['selectedSport'] = $sport;
			$this->data['scores'] =  $this->data['collection']->where('sport', $sport);
		}
		return view('scoresbyte.scores',$this->data);
	}

}

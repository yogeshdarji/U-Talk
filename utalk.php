<?php


answer();
function f2($url){


      
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-type: application/json'
        ));
        
        $json = curl_exec($ch);
        curl_close($ch);
        $ans = json_decode($json, true);
       $x=0;
       
	foreach($ans["sample"] as $key => $values){

		
			say($ans["sample"][$x]["data"]);
			wait(500);
			$x++;

	}
        
        

}
do{





$result = ask("Hi. to get sports supdate , say sports. to get events update on campus , say events, to get weather update, say weather, to get news say news.", array(
    "choices" => "sports, events , end , news"));
    
if ($result->name == "choice") {
    if ($result->value == "sports") {
        
        $url  = "https://www.utdallas.edu/~ssp151830/sports.json?method=index";
		f2($url);
        
    }
    if ($result->value == "events") {
        $url  = "https://www.utdallas.edu/~ssp151830/events.json?method=index";
		f2($url);
        
    }
     if ($result->value == "weather") {
        
        $url  = "https://www.utdallas.edu/~ypd150030/weather.json?method=index";
		f2($url);
        
    }
    
    if ($result->value == "news") {
        
        $url  = "https://www.utdallas.edu/~ssp151830/news.json?method=index";
		f2($url);
        
    }
   
    
}
}while($result->value != "end");

 hangup();

?>
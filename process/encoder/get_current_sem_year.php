<?php
	
	//get current sem and academic year
	$current_date=date('M-d');
	$current_year=date('Y')-1;
	if($current_date >= date('June-1') && $current_date <= date('October-19')){
		$sem="1st";
		$acadyear=$current_year."-".($current_year+1);
	}
	else if($current_date >= date('October-20') && $current_date <= date('December-31')){
		$sem="2nd";
		$acadyear=$current_year."-".($current_year+1);
	}
	else if($current_date >= date('January-1') && $current_date <= date('March-31')){
		$sem="2nd";
		$acadyear=($current_year-1)."-".$current_year;
	}
	else{
		$sem="Summer";
		$acadyear=($current_year-1)."-".$current_year;
	}
?>
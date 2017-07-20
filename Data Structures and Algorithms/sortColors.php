<?php

function sortColors($colorArray){
	
	$colorCountArray = array();
	for($i=0;$i<count($colorArray);$i++){
		$colorCountArray[$colorArray[$i]] = (!array_key_exists($colorArray[$i], $colorCountArray)) ? 1 : $colorCountArray[$colorArray[$i]]+1;
	}
	$pointer = 0;
	for($i=0;$i<count($colorArray);$i++){
		if($colorCountArray[$pointer] > 0){
			$colorArray[$i] = $pointer;
			$colorCountArray[$pointer]--;
		} else {
			$pointer++;
			$colorArray[$i] = $pointer;
			$colorCountArray[$pointer]--;
		}
	}
	return $colorArray;
}

print_r(sortColors(array(2,0,1,2,1,0)));
?>
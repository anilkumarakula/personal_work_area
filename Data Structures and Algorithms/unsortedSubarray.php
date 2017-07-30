<?php

function unsortedSubarray($array){
	
	if(count($array) > 0){
		$i=0;
		$j=count($array)-1;
		$start = $end = -1;
		while($j > $i){
			if($array[$i] < $array[$i+1]){
				$i++;
			} else {
				$start = $i;
			}
			if($array[$j] > $array[$j-1]){
				$j--;
			} else {
				$end = $j;
			}
			if(($start != -1 && $end != -1)){
				break;
			}
		}
		return array($start,$end);
	} else {
		echo "Invalid Input";
	}
}

print_r(unsortedSubarray(array(3, 4, 8, 7, 10, 6, 17)));

print_r(unsortedSubarray(array(3, 4, 8, 7, 20, 6 , 17)));

?>
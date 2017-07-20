<?php

function twoSum($array, $target){
	$count = count($array);
	if($count > 0){
		$i = 0;
		$j = $count-1;
		while($j > $i){
			if(($array[$j]+$array[$i]) > $target){
				$j--;
			} else if(($array[$j]+$array[$i]) < $target){
				$i++;
			} else {
				return array($i,$j);
			}
		}
		return array(-1,-1);
	} else {
		echo "invalid input";
	}
}

//print_r(twoSum(array(-5,1,3,6,7), -2));
print_r(twoSum(array(1,9,10), 8));

?>
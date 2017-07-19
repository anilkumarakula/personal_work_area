<?php

function twoSum($arr, $target){
	$arrayHashMap = array();
	for($i=0;$i<count($arr);$i++){
		$diff = $target-$arr[$i];
		if(array_key_exists($diff, $arrayHashMap)){
			return array($arrayHashMap[$diff], $i);
		} else {
			$arrayHashMap[$arr[$i]] = $i;
		}
	}
	return array(-1,-1);
}

print_r(twoSum(array(1,6,-5,7,3), -2));
?>
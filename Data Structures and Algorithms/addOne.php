<?php

function addOne($arr){
	for($i=(count($arr)-1);$i>=0;$i--){
		if($arr[$i] >=0 && $arr[$i] <= 8){
			$arr[$i] += 1;
			break;
		} else {
			$arr[$i] = 0;
		}
	}
	if($arr[0] == 0){
		$arr[0] = 1;
		$arr[count($arr)] = 0;
	}
	return $arr;
}

print_r(addOne(array(1,9,9)));

?>
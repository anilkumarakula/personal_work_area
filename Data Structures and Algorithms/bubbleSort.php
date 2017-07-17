<?php
/*
* Bubble Sort
* Time Complexity: O(n^2)
* Space Complexity: O(1)
*/
function bubbleSort($arr){
	$arrayCount = count($arr);
	if($arrayCount > 0){
		while($arrayCount--){
			$isSwapDone = false;
			for($j=0;$j<$arrayCount;$j++){
				if($arr[$j] > $arr[($j+1)]){
					$temp = $arr[($j+1)];
					$arr[($j+1)] = $arr[$j];
					$arr[$j] = $temp;
					$isSwapDone = true;
				}
			}
			if($isSwapDone === false){
				break;
			}
		}
		return $arr;
	} else {
		echo "Not a valid input";
	}
}

print_r(bubbleSort(array(3,9,1,4,7)));

?>
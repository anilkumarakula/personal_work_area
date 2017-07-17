<?php
/*
* Selection Sort
* Time Complexity: O(n^2)
* Space Complexity: O(1)
*/
function selectionSort($arr){
	if(count($arr) > 0){
		for($j=0;$j < count($arr);$j++){
			$lowPosition = $j;
			for($i=$lowPosition+1; $i<count($arr);$i++){
				if($arr[$lowPosition] > $arr[$i]){
					$lowPosition = $i;
				}
			}
			$temp = $arr[$lowPosition];
			$arr[$lowPosition] = $arr[$j];
			$arr[$j] = $temp;
		}
		return $arr;
	} else {
		echo "Not a valid input";
	}
}

print_r(selectionSort(array(3,9,1,4,7)));

?>
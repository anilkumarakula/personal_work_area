<?php
/*
* Insertion Sort
* Time Complexity: O(n^2)
* Space Complexity: O(1)
*/
function insertionSort($arr){
	print_r($arr);
	if(count($arr) > 0){
		for($i=0;$i<count($arr);$i++){
			$value_to_insert = $arr[$i];
			$holePostition = $i;
			while($holePostition > 0 && $arr[$holePostition-1] > $value_to_insert){
				$arr[$holePostition] = $arr[$holePostition-1];
				$holePostition--;
			}
			$arr[$holePostition] = $value_to_insert;
		}
		return $arr;
	} else {
		echo "Not valid input";
	}
}

print_r(insertionSort(array(3,9,1,4,7)));

?>
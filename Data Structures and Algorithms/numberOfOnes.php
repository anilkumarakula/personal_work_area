<?php
/*
* Time Complexity: O(logn)
* Space Complexity: O(1)
*/
function numberOfOnes($array){
	$arrayCount = count($array);
	if($arrayCount > 0){
		$mid = floor($arrayCount/2);
		if($array[$mid] == 0){
			for($i=($mid+1);$i<$arrayCount;$i++){
				if($array[$i] == 1){
					return ($arrayCount - $i);
				}	
			}
			return 0;
		} else {
			for($i=($mid-1);$i>=0;$i--){
				if($array[$i] == 0){
					return ($arrayCount - ($i+1));
				}
			}
			return ($arrayCount);
		}
	} else {
		echo "Invalid Input";
	}
}

echo numberOfOnes(array(0,0,0,0));

?>
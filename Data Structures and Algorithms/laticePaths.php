<?php

/*
	Latice Path using Pure Recursion
*/
function laticePath($x, $y){
	if($x === 0 && $y == 0){
		return 1;
	} else if($x < 0 || $y < 0) {
		return 0;
	}
	return laticePath($x-1, $y) + laticePath($x, $y-1);
}

echo "LP With Pure Recursion -->".laticePath(2,3)."\n";

/*
	Latice Path using Recursion with Side Effects
*/

function laticePathSideEffect($size, $x=0, $y=0){
	if($x > $size || $y > $size){
		return 0;
	} else if ($x == $size && $y == $size) {
		return 1;
	}
	return laticePathSideEffect($size, $x+1, $y) + laticePathSideEffect($size, $x, $y+1);
}

echo "LP Side Effect -->".laticePathSideEffect(3)."\n";

/*
	Latice Path using Recursion with Helper method
*/
class laticePathWithHelperClass{
	function __construct($size){
		$this->size = $size;
		$this->count = 0;
		$this->laticePathWithHelper();
	}
	
	function laticePathWithHelper(){
		$this->traverse(0,0);
	}
	
	function traverse($x, $y){
		if($x == $this->size && $y == $this->size){
			$this->count++;
			return;
		} else if($x > $this->size || $y > $this->size){
			return;
		}
		$this->traverse($x+1, $y);
		$this->traverse($x, $y+1);
	}
}

$lpWithHelperObj = new laticePathWithHelperClass(3);
echo "LP With Helper -->".$lpWithHelperObj->count."\n";

?>
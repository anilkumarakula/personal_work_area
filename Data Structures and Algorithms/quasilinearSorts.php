<?php

/**
 *  Homework 06 - Quasilinear Sorts
 *
 *  Problem 1: Quicksort
 *
 *  Prompt:    Given an unsorted array of integers, return the array
 *             sorted using quicksort.
 *
 *  Input:     input {Array}
 *  Output:    {Array}
 *
 *  Example:   [3,9,1,4,7] --> [1,3,4,7,9]
 *
 *
 *  Problem 2: Mergesort
 *
 *  Prompt:    Given an unsorted array of integers, return the array
 *             sorted using mergesort.
 *
 *  Input:     input {Array}
 *  Output:    {Array}
 *
 *  Example:   [3,9,1,4,7] --> [1,3,4,7,9]
 */
 
 function quickSort($array)
{
	$length = count($array);
	if($length <= 1){
		return $array;
	}
	else{
		$pivot = $array[0];
		$left = $right = array();
		for($i = 1; $i < count($array); $i++)
		{
			if($array[$i] < $pivot){
				$left[] = $array[$i];
			}
			else{
				$right[] = $array[$i];
			}
		}
		return array_merge(quickSort($left), array($pivot), quickSort($right));
	}
}

//$sorted = quick_sort($unsorted);

 //print_r(quickSort(array(4, 15, 16, 50, 8, 23, 42, 108)));
 
 function mergeSort($array){
	 
	 function mergeAndSort($arr1,$arr2){
		 $totalLength = count($arr1)+count($arr2);
		 $result = array();
		 $i = 0;
		 $j = 0;
		 while (($i+$j) < $totalLength){
			 if($j >= count($arr2) || ($i < count($arr1) && $arr1[$i] <= $arr2[$j])){
				 $result[] = $arr1[$i];
				 $i++;
			 } else {
				 $result[] = $arr2[$j];
				 $j++;
			 }
		 }
		 return $result;
	 }
	 
	 function splitArray($array){
		 if(count($array) < 2) { return $array; }
		 $mid = floor(count($array)/2);
		 return mergeAndSort(splitArray(array_slice($array, 0, $mid)),splitArray(array_slice($array,$mid)));
	 }
	 return splitArray($array);
 }
 
 //print_r(quickSort(array(3,9,1,4,7,2,5,8,11,6)));
 print_r(mergeSort(array(4, 15, 16, 50, 8, 23, 42, 108)));
 
?>
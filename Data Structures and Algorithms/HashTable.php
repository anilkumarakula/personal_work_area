<?php

class HashTable{
	/*
		storage:  {Array} - an array of arrays.
		buckets:  {Integer} - the maximum number of buckets that your
		storage can contain. Initially set to 8.
		size:   {Integer} count of key-value pairs in the storage
	*/
	function __construct(){
		$this->storage = array();
		$this->bucketSize = 8;
		$this->size = 0;
	}

	/*
		hash:   Method that takes a key and bucket number and provides a hashed value. The dbjb2 hashing function has been provided.
	*/
	function hashKey($key, $bucket){
		$hash = 5381;
		$length = strlen($key);
		for($i = 0; $i < $length; $i++) {
			$hash = ( ($hash << 5) + $hash ) + $key[$i];
		}
		return $hash % $bucket;
	}
	
	/*
		insert:   Method that adds a key-value pair into the storage. If the key already exists, the value should be updated. Use separate chaining to handle collisions.
	*/
	function insert($key, $value){
		$index = $this->hashKey($key, $this->bucketSize);
		if(!array_key_exists($index, $this->storage)){
			$this->storage[$index] = array();
		}
		$bucket = $this->storage[$index];
		for($i=0;$i<count($bucket);$i++){
			if($bucket[$i][0] === $key){
				$bucket[$i][1] = $value;
			}
		}
		$bucket[] = array($key, $value);
		$this->storage[$index] = $bucket;
		$this->size++;
		$this->resize();
	}
	
	/*
		get:   Method that given a key, return its corresponding value. If the key does not exist, return null.
	*/
	function get($key){
		$index = $this->hashKey($key, $this->bucketSize);
		if(!array_key_exists($index, $this->storage)){
			return null;
		}
		$bucket = $this->storage[$index];
		for($i=0;$i<count($bucket);$i++){
			if($bucket[$i][0] === $key){
				return $bucket[$i][1];
			}
		}
		return null;
	}

	/*
		remove:   Method that takes a key as its input, and looks for the and removes the key-value pair from the bucket.
	*/
	function remove($key){
		$index = $this->hashKey($key, $this->bucketSize);
		if(!array_key_exists($index, $this->storage)){
			return false;
		}
		$bucket = $this->storage[$index];
		for($i=0;$i<count($bucket);$i++){
			if($bucket[$i][0] === $key){
				//return $bucket[$i][1];
				unset($bucket[$i]);
				$this->size--;
				$this->resize();
			}
		}
		$this->storage[$index] = $bucket;
	}
	
	/*
		resize:   If the load factor reaches a critical 0.75 or higher, double the number of buckets. If the load factor is 0.25 or less, half the number of buckets. Make sure the number
				  of buckets do not fall below 8 and re-index all key-value pairs if bucket size is changed.
	*/
	function resize(){
		$load = round(($this->size/$this->bucketSize),2);
		if($load > 0.25 && $load < 0.75) {
			return;
		}
		if($load <=0.25 && $this->bucketSize === 8){
			return;
		}
		$temp = $this->storage;
		$this->storage = array();
		$this->bucketSize *= ($load >= 0.75) ? 2 : 0.5;
		for($i=0;$i<count($temp);$i++){
			$bucket = (array_key_exists($i, $temp)) ? $temp[$i] : array();
			for($j=0;$j<count($bucket);$j++){
				$this->size--;
				$this->insert($bucket[$j][0],$bucket[$j][1]);
			}
		}
	}
}

$hash_obj = new HashTable();
$hash_obj->insert('me', 'John Doe');
$hash_obj->insert('gf', 'Jane Doe');
$hash_obj->insert('f', 'Tony');
echo $hash_obj->get('g');

?>
<?php

class Graph{
	function __construct(){
		/*	
			storage: {Hash Table} - the keys represent unique vertex ids and the values are arrays of Integers representing the vertex ids of its neighors.
		*/
		$this->storage = array();
	}
	
	/*
		addVertex: Method that accepts a vertex id {Integer} and adds the vertex to the graph.  Return true if success and false if failed.
	*/
	function addVertex($id){
		if(array_key_exists($id, $this->storage)){
			return false;
		} else {
			$this->storage[$id] = array();
			return true;
		}
	}
	
	/*
		removeVertex: Method that accepts a vertex id and removes the vertex with the matching id. Return true if success and falseif failed.
	*/
	function removeVertex($id){
		if(!array_key_exists($id, $this->storage)){
			return false;
		} else {
			foreach ($this->storage as $vertex_id => $edges){
				$pos = array_search($id, $edges);
				array_splice($edges, $pos, 1);
				$this->storage[$vertex_id] = $edges;
			}
			unset($this->storage[$id]);
			return true;
		}
	}
	
	/*
		addEdge: Method that accepts two vertex ids and creates a directed edge from the first vertex to the second. Returns true if success and false if failed.
	*/
	function addEdge($id1, $id2){
		if(!array_key_exists($id1, $this->storage) || !array_key_exists($id2, $this->storage)) {
			return false;
		}
		if(array_search($id2, $this->storage[$id1])) {
			return false;
		}
		$this->storage[$id1][] = $id2;
		return true;
	}
	
	/*
		removeEdge: Method that accepts two vertex id's and removes the directed edge from the first vertex to the second. Returns true if success and false if failed.
	*/
	function removeEdge($id1, $id2){
		if(array_key_exists($id1, $this->storage)){
			$pos = array_search($id2, $this->storage[$id1]);
			if($pos != false){
				array_splice($this->storage[$id1], $pos, 1);
				return true;
			}
		}
		return false;
	}
	
	/*
		isVertex:  Method that accepts an id, and returns whether the vertex exists in the graph.
	*/
	function isVertex($id){
		if(array_key_exists($id, $this->storage)){
			return true;
		}
		return false;
	}
	
	/*
		neighbors: Method that accepts a vertex id, and returns all of the edges of that vertex.
	*/
	function neighbors($id){
		if(array_key_exists($id, $this->storage)){
			return $this->storage[$id];
		}
		return array();
	}
}

$graph_obj = new Graph();
$graph_obj->addVertex(0);
$graph_obj->addVertex(1);
$graph_obj->addVertex(2);
$graph_obj->addVertex(3);
$graph_obj->addEdge(0, 1);
$graph_obj->addEdge(0, 2);
$graph_obj->addEdge(1, 3);
$graph_obj->addEdge(2, 3);
print_r($graph_obj->neighbors(0));
print_r($graph_obj->neighbors(1));


?>
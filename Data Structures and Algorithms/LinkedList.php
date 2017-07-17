<?php
/*
*  Homework 03 - Linked List
*
*  Problem 1: Node class
*
*  Prompt:    Create a Node class
*             The Node class should contain the following properties:
*
*                 value:   integer value (initially null)
*                  next:   pointer to another node (initially null)
*
*               Example:   input: let sample1 = new Node(1)
*                          sample1.value     // 1
*                          sample1.next      // null
*
*               Example:   input: let sample2 = new Node()
*                          sample2.value     // null
*                          sample2.next      // null
*
*/
class Node{
	function __construct($node_value){
		$this->value = isset($node_value) ? $node_value : null;
		$this->next = null;
	}
}
/*$nodeObj = new Node(5);
echo "<pre>";var_dump($nodeObj);echo "</pre>";*/
/*  Problem 2:  LinkedList class
*
*  Prompt:     Create a LinkedList class
*              The LinkedList class should contain the following properties:
*
*                length:   The number of nodes in the linked list
*                  head:   A pointer to the head node
*                  tail:   A pointer to the tail node
*
*              The LinkedList class should also contain the following methods:
*
*                append:   A method that appends a value to the end of the
*                          LinkedList.
*
*                          Input:     value
*                          Output:    undefined
*
*                insert:   A method that inserts an integer value at a set
*                          index in the LinkedList (assume head index is 0).
*
*                          Input:     value, index
*                          Output:    undefined
*
*                delete:   A method that removes a node at a specified index.
*
*                          Input:     index
*                          Output:    undefined
*
*              contains:   A method that checks to see if a value is contained
*                          in the list.
*
*                          Input:     value
*                          Output:    Boolean
*
*    What are the time and auxiliary space complexity of the various
*    methods?
*
*/

class LinkedList{
	function __construct(){
		//$this->nodeObj = new Node();
		$this->listLength = 0;
		$this->head = null;
		$this->tail = null;
	}
	
	function append($val){
		if($this->listLength === 0){
			$this->head = new Node($val);
			$this->tail = $this->head;
		} else {
			$this->tail->next = new Node($val);
			$this->tail = $this->tail->next;
		}
		$this->listLength++;
		
	}
	
	function insert($val, $search_val){
		$currentNode = $this->head;
		$newNode = new Node($val);
		while($currentNode->next != null){
			if($currentNode->value === $search_val){
				$newNode->next = $currentNode->next;
				$currentNode->next = $newNode;
				if($newNode->next === null){
					$this->tail = $newNode;
				}
				$this->listLength++;
				return;
			}
			$currentNode = $currentNode->next;
		}
		echo "Could not find search node in the list";
	}
	
	function delete($index){
		//echo "$index\n";
		if($index == 0 && $this->listLength == 0){
			$this->head = null;
			$this->tail = null;
			$this->listLength--;
			return;
		} else if ($index == 0){
			$this->head = $this->head->next;
			$this->listLength--;
			return;
		}
		$currentNode = $this->head;
		//print_r($currentNode);
		$iterateCount = 0;
		while($currentNode != null){
			//echo $iterateCount."-->".$index;
			if($iterateCount == ($index-1) && $currentNode->next != null && $currentNode->next === $this->tail){
				$currentNode->next = $currentNode->next->next;
				$this->tail = $currentNode;
				$this->listLength--;
				return;
			} else if ($iterateCount === ($index-1) && $currentNode->next != null){
				//echo $iterateCount."-->".$index;
				//print_r($currentNode);
				$currentNode->next = $currentNode->next->next;
				$this->listLength--;
				return;
			}
			$iterateCount++;
			$currentNode = $currentNode->next;
		}
		echo "Couldn't find the index to delete";
	}
	
	function contains($search){
		$currentNode = $this->head;
		while($currentNode->next != null){
			$currentNode = $currentNode->next;
			if($currentNode->value === $search){
				return true;
			}
		}
		return false;;
	}
}

$linkedListObj = new LinkedList();
$linkedListObj->append(5);
$linkedListObj->append(1);
$linkedListObj->append(8);
$linkedListObj->append(4);
//echo "<pre>";print_r($linkedListObj);echo "</pre>";
$linkedListObj->delete(2);
//echo $linkedListObj->contains(4);
//echo "\n<pre>";print_r($linkedListObj);echo "</pre>";


////////////////////////////////////////////////////////////
///////////////  DO NOT TOUCH TEST BELOW!!!  ///////////////
////////////////////////////////////////////////////////////
/*
console.log('Node Class');
var testCount = [0, 0];

assert(testCount, 'able to create an instance', function(){
  var node = new Node();
  return typeof node === 'object';
});

assert(testCount, 'has value property', function(){
  var node = new Node();
  return node.hasOwnProperty('value');
});

assert(testCount, 'has next property', function(){
  var node = new Node();
  return node.hasOwnProperty('next');
});

assert(testCount, 'has default value set to null', function(){
  var node = new Node();
  return node.value === null;
});

assert(testCount, 'able to assign a value upon instantiation', function(){
  var node = new Node(5);
  return node.value === 5;
});

assert(testCount, 'able to reassign a value', function(){
  var node = new Node();
  node.value = 5;
  return node.value === 5;
});

assert(testCount, 'able to point to another node', function(){
  var node1 = new Node(5);
  var node2 = new Node(10);
  node1.next = node2;
  return node1.next.value === 10;
});

console.log('PASSED: ' + testCount[0] + ' / ' + testCount[1], '\n\n');



console.log('LinkedList Class');
var testCount = [0, 0];

assert(testCount, 'able to create an instance', function(){
  var linkedList = new LinkedList();
  return typeof linkedList === 'object';
});

assert(testCount, 'has head property', function(){
  var linkedList = new LinkedList();
  return linkedList.hasOwnProperty('head');
});

assert(testCount, 'has tail property', function(){
  var linkedList = new LinkedList();
  return linkedList.hasOwnProperty('tail');
});

assert(testCount, 'has length property', function(){
  var linkedList = new LinkedList();
  return linkedList.hasOwnProperty('length');
});

assert(testCount, 'default head set to null', function(){
  var linkedList = new LinkedList();
  return linkedList.head === null;
});

assert(testCount, 'default tail set to null', function(){
  var linkedList = new LinkedList();
  return linkedList.tail === null;
});

assert(testCount, 'default length set to zero', function(){
  var linkedList = new LinkedList();
  return linkedList.length === 0;
});
console.log('PASSED: ' + testCount[0] + ' / ' + testCount[1], '\n\n');



console.log('LinkedList Insert Method');
var testCount = [0, 0];

assert(testCount, 'has insert method', function(){
  var linkedList = new LinkedList();
  return Object.prototype.toString.apply(linkedList.insert) === '[object Function]';
});

assert(testCount, 'able to insert a node into empty linked list', function(){
  var linkedList = new LinkedList();
  linkedList.insert(5, 0);
  return linkedList.length === 1 && linkedList.head.value === 5 && linkedList.tail.value === 5;
});

assert(testCount, 'able to insert a node after another node', function(){
  var linkedList = new LinkedList();
  linkedList.insert(5, 0);
  linkedList.insert(10, 1);
  return linkedList.length === 2 && linkedList.head.value === 5 && linkedList.tail.value === 10;
});

assert(testCount, 'able to insert a node before another node', function(){
  var linkedList = new LinkedList();
  linkedList.insert(5, 0);
  linkedList.insert(10, 0);
  return linkedList.length === 2 && linkedList.head.value === 10 && linkedList.tail.value === 5;
});

assert(testCount, 'able to insert a node in between two nodes', function(){
  var linkedList = new LinkedList();
  linkedList.insert(5, 0);
  linkedList.insert(10, 1);
  linkedList.insert(7, 1);
  return linkedList.length === 3 && linkedList.head.value === 5 &&
         linkedList.tail.value === 10 && linkedList.head.next.value === 7;
});

assert(testCount, 'does not insert a node if index is out of bounds linked list', function(){
  var linkedList = new LinkedList();
  linkedList.insert(5, -1);
  linkedList.insert(10, 3);
  return linkedList.length === 0 && linkedList.head === null && linkedList.tail === null;
});
console.log('PASSED: ' + testCount[0] + ' / ' + testCount[1]);


console.log('\n');
console.log('LinkedList Append Method');
var testCount = [0, 0];

assert(testCount, 'has append method', function(){
  var linkedList = new LinkedList();
  return Object.prototype.toString.apply(linkedList.append) === '[object Function]';
});

assert(testCount, 'able to append a node into empty linked list', function(){
  var linkedList = new LinkedList();
  linkedList.append(5);
  return linkedList.length === 1 && linkedList.head.value === 5 && linkedList.tail.value === 5;
});

assert(testCount, 'able to append a second node a linked list', function(){
  var linkedList = new LinkedList();
  linkedList.append(5);
  linkedList.append(10);
  return linkedList.length === 2 && linkedList.head.value === 5 && linkedList.tail.value === 10;
});

assert(testCount, 'able to append a third node a linked list', function(){
  var linkedList = new LinkedList();
  linkedList.append(5);
  linkedList.append(10);
  linkedList.append(15);
  return linkedList.length === 3 && linkedList.head.value === 5 && linkedList.tail.value === 15;
});

console.log('PASSED: ' + testCount[0] + ' / ' + testCount[1], '\n\n');



console.log('LinkedList Delete Method');
var testCount = [0, 0];

assert(testCount, 'has delete method', function(){
  var linkedList = new LinkedList();
  return Object.prototype.toString.apply(linkedList.delete) === '[object Function]';
});

assert(testCount, 'able to delete a node from the head', function(){
  var linkedList = new LinkedList();
  linkedList.append(5);
  linkedList.append(10);
  linkedList.delete(0);
  return linkedList.length === 1 && linkedList.head.value === 10;
});

assert(testCount, 'able to delete a node from the tail', function(){
  var linkedList = new LinkedList();
  linkedList.append(5);
  linkedList.append(10);
  linkedList.delete(1);
  return linkedList.length === 1 && linkedList.tail.value === 5;
});

assert(testCount, 'able to delete a node in between two nodes', function(){
  var linkedList = new LinkedList();
  linkedList.append(5);
  linkedList.append(10);
  linkedList.append(15);
  linkedList.delete(1);
  return linkedList.length === 2 && linkedList.head.value === 5 &&
         linkedList.tail.value === 15;
});

assert(testCount, 'able to delete the only node in a linked list', function(){
  var linkedList = new LinkedList();
  linkedList.append(5);
  linkedList.delete(0);
  return linkedList.length === 0 && linkedList.head === null &&
         linkedList.tail === null;
});

assert(testCount, 'does not delete a node when the index is out of bounds', function(){
  var linkedList = new LinkedList();
  linkedList.append(5);
  linkedList.delete(-1);
  linkedList.delete(2);
  return linkedList.length === 1 && linkedList.head.value === 5 &&
         linkedList.tail.value === 5;
});

console.log('PASSED: ' + testCount[0] + ' / ' + testCount[1], '\n\n');



console.log('LinkedList Contains Method');
var testCount = [0, 0];

assert(testCount, 'has contains method', function(){
  var linkedList = new LinkedList();
  return Object.prototype.toString.apply(linkedList.contains) === '[object Function]';
});

assert(testCount, 'returns true if linked list contains value', function(){
  var linkedList = new LinkedList();
  linkedList.append(5);
  linkedList.append(10);
  linkedList.append(15);
  return linkedList.contains(15) === true;
});

assert(testCount, 'returns false if linked list does not contains value', function(){
  var linkedList = new LinkedList();
  linkedList.append(5);
  linkedList.append(10);
  linkedList.append(15);
  return linkedList.contains(8) === false;
});

console.log('PASSED: ' + testCount[0] + ' / ' + testCount[1]);


// custom assert function to handle tests
// Array count : keeps track out how many tests pass and how many total
//   in the form of a two item array i.e., [0, 0]
// String name : describes the test
// Function test : performs a set of operations and returns a boolean
//   indicating if test passed
function assert(count, name, test) {
  if(!count || !Array.isArray(count) || count.length !== 2) {
    count = [0, '*'];
  } else {
    count[1]++;
  }

  var pass = 'false';
  try {
    if (test()) {
      pass = ' true';
      count[0]++;
    }
  } catch(e) {}
  console.log('  ' + (count[1] + ')   ').slice(0,5) + pass + ' : ' + name);
}
*/
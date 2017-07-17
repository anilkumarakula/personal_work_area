<?php

/**
 *  Homework 05 - Binary Search Tree
 *
 *  Problem 1: TreeNode class
 *
 *  Prompt:    Create a TreeNode class
 *             The TreeNode class should contain the following properties:
 *
 *                   value:   integer value (default null)
 *                    left:   pointer to another node (initially null)
 *                   right:   pointer to another node (initially null)
 *
 *                 Example:   let sample = new TreeNode(1)
 *                            sample.value   // 1
 *                            sample.left    // null
 *                            sample.right   // null
 */
class Node{
	function __construct($node_value){
		$this->value = isset($node_value) ? $node_value : null;
		$this->left = null;
		$this->right = null;
	}
}
$nodeObj = new Node(5);
//print_r($nodeObj);


/*  Problem 2: BinarySearchTree class.
 *
 *  Prompt:    Create a BinarySearchTree class
 *
 *             The BinarySearchTree class should contain the following
 *             properties:
 *
 *                    root:   A pointer to the root node (initially null)
 *                    size:   The number of nodes in the BinarySearchTree
 *
 *             The BinarySearchTree class should also contain the following
 *             methods:
 *
 *                  insert:   A method that takes takes an integer value, and
 *                            creates a node with the given input.  The method
 *                            will then find the correct place to add the new
 *                            node. Values larger than the current node node go
 *                            to the right, and smaller values go to the left.
 *
 *                            Input:     value
 *                            Output:    undefined
 *
 *                  search:   A method that will search to see if a node with a
 *                            specified value exists and returns true or false
 *                            if found.
 *
 *                            Input:     value
 *                            Output:    boolean
 *
 *
 *             What are the time and auxilliary space complexities of the
 *             various methods?
 *
 *
 *  Extra:     Remove method for BinarySearchTree class
 *
 *  Prompt:    Add the following method to the BinarySearchTree class:
 *
 *                  remove:   A method that removes a value matching the input
 *                            the tree is then retied so that the binary search
 *                            tree order is not violated.
 */
 
 class BinarySearchTree{

	 function __construct(){
		 $this->root = null;
		 $this->size = 0;
	 }

	 function insert($insert_value){
		 $newNode = new Node($insert_value);
		 if($this->root === null){
			 $this->root = $newNode;
		 } else {
			 $current = $this->root;
			 $parent = null;
			 while(true){
				 $parent = $current;
				 if($newNode->value < $parent->value){
					 $current = $parent->left;
					 if($current == null){
						 $parent->left = $newNode;
						 return;
					 }
				 } else {
					 $current = $parent->right;
					 if($current == null){
						 $parent->right = $newNode;
						 return;
					 }
				 }
			 }
		 }
	 }
	 
	 function search($search_value){
		 if($this->root === null){
			 return false;
		 } else {
			 $current = $this->root;
			 while($current->value != $search_value){
				 echo "-> ".$current->value;
				 if ($current->value > $search_value) {
					 $current = $current->left;
				 } else {
					 $current = $current->right;
				 }
				 if($current->value === $search_value){
					 return true;
				 }
			 }
		 }
		 return false;
	 }

	 function remove($remove_value){
		 
	 }
 }

 $bst = new BinarySearchTree();
 $bst->insert(25);
 $bst->insert(17);
 $bst->insert(29);
 $bst->insert(11);
print_r($bst->root);
echo $bst->search(11);
?>
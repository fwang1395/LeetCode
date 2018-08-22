<?php
class TreeNode
{
	public function __construct($nodevalue){
		$this->value = $nodevalue;
		$this->left = None;
		$this->right = None;
	}
}

function sortedArrayToBST($list,$left,$right){
	if($right < $left) return None;
	if($left == $right){
		$node = new TreeNode($list[$left]);
		return $node;
	}
	if($left < $right){
		$middle = intval(($left+$right)/2);
		print_r($middle);
		$node = new TreeNode($list[$middle]);
		$node->left = sortedArrayToBST($list,$left,$middle-1);
		$node->right = sortedArrayToBST($list,$middle+1,$right);
		return $node;
	}
}


function isValidBST()

$list = range(1,10);
var_dump($list);
$root = sortedArrayToBST($list,0,9);

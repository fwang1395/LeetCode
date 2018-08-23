<?php
class TreeNode
{
	public function __construct($nodevalue){
		$this->value = $nodevalue;
		$this->left = Null;
		$this->right = Null;
	}
}

function sortedArrayToBST($list,$left,$right){
	if($right < $left) return Null;
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


function isValidBSTByInOrder($node){
	$inOrderList = [];
	inOrderRecursion($node,$inOrderList);
	print_r($inOrderList);
	$count = count($inOrderList);
	$index = 0;
	while($index < ($count -1)){
		if( $inOrderList[$index] < $inOrderList[$index+1]){
			$index++;
		}
		else{
			return false;
		}
	}
	return true;
}

function inOrderRecursion($node,&$inOrderList){
	if($node == NULL){
		return null;
	}
	if($node->left != NULL){
		inOrderRecursion($node->left,$inOrderList);
	}
	$inOrderList[] = $node->value;
	if($node->right !=NULL){
		inOrderRecursion($node->right,$inOrderList);
	}
}

$list = range(1,10);
var_dump($list);
$root = sortedArrayToBST($list,0,9);
$isvalid = isValidBSTByInOrder($root);
print_r($isvalid);

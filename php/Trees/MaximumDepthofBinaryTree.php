<?php

/**
 * [Maximum Depth of Binary Tree]
  Given a binary tree, find its maximum depth.

The maximum depth is the number of nodes along the longest path from the root node down to the farthest leaf node.

Note: A leaf is a node with no children.

Example:

Given binary tree [3,9,20,null,null,15,7],

    3
   / \
  9  20
    /  \
   15   7

return its depth = 3.
 */

/**
 * Definition for a binary tree node.
 */

class TreeNode 
{
    public $val = null;
    public $left = null;
    public $right = null;
    public function __construct($nodeValue){
        $this->val = $nodeValue;
    }

}
class CreateTree
{
    public $nodeList;
    public function __construct($list)
    {
        $this->nodeList = $list;
        var_dump($this->nodeList);
    }


    public function createBinaryTreeByPreOrder(&$root = null){
        $node = array_shift($this->nodeList);
        if ($node == null){
           return 0;
        }
        elseif($node == "#"){
            $root = null;
        }
        elseif(isset($node) && !empty($node)){
            $root = new TreeNode($node);
            $this->createBinaryTreeByPreOrder($root->left);
            $this->createBinaryTreeByPreOrder($root->right);
        }
        return $root;
    }

     public function createBinaryTreeByLevelOrder(){
        $node = array_shift($this->nodeList);
        if ($node == null){
           return 0;
        }   
        elseif($node == "#"){
            $root = null;
        }
        $root = new TreeNode($node);
        $toSetChildList = [];
        $toSetChildList[] = $root;
        while(count($toSetChildList)>0){
            if(count($this->nodeList)>0){
                $leftValue = array_shift($this->nodeList);
                if(!empty($leftValue) && $leftValue != "#"){
                    $leftNode = new TreeNode($leftValue);
                    $toSetChildList[] = $leftNode;
                    $toSetChildList[0]->left = $leftNode;
                }
            }
            if(count($this->nodeList)>0){
                $rightValue = array_shift($this->nodeList);
                if(!empty($rightValue) && $rightValue != "#"){
                    $rightNode = new TreeNode($rightValue);
                    $toSetChildList[] = $rightNode;
                    $toSetChildList[0]->right = $rightNode;
                }
            }
            array_shift($toSetChildList);
        }
        print_r($root);
        return $root;
    }


    public function maxDepth($node)
    {
        if($node == null ){
            return 0;
        }
        return max($this->maxDepth($node->left),$this->maxDepth($node->right)) + 1;
    }


    public function maxDepth2($root){
        if ($root == NULL ){
            return 0;
        }
        $level = 0;
        $list = array($root);
        while(count($list)>0){
            $level++;
            $nodeCount = count($list);
            for($tempCount=0;$tempCount<$nodeCount;$tempCount++){
                $node = array_shift($list);
                if ($node->left != NULL) {
                    $list[] = $node->left;
                }
                if($node->right !=NULL){
                    $list[] = $node->right;
                }
            }
        }
        return $level;
    }

    public function isValidBSTByInOrder($node){
        $inOrderList = [];
        $this->inOrderRecursion($node,$inOrderList);
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

    public function inOrderRecursion($node,&$inOrderList){
        if($node == NULL){
            return null;
        }
        if($node->left !=NULL){
            $this->inOrderRecursion($node->left,$inOrderList);
        }
        $inOrderList[] = $node->val;
        if($node->right !=NULL){
            $this->inOrderRecursion($node->right,$inOrderList);
        }
    }

}

$list = array(8,4,12,2,6,11,15,1,3,5,7);
var_dump($list);
$tree = new CreateTree($list);
// $root = $tree->createBinaryTreeByPreOrder();
$root = $tree->createBinaryTreeByLevelOrder();
var_dump($root);
// $maxDep = $tree->maxDepth($root);

// echo "maxDepth:${maxDep}";

// $maxDep2 = $tree->maxDepth2($root);

// echo "maxDepth:${maxDep2}";


echo $tree->isValidBSTByInOrder($root);

// $inOrderList = [];
// $tree->inOrderRecursion($root,&$inOrderList);
// 
// 
// print_r($inOrderList);







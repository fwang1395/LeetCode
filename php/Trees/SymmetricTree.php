<?php
/**
 * Symmetric Tree
 * Given a binary tree, check whether it is a mirror of itself (ie, symmetric around its center).

For example, this binary tree [1,2,2,3,4,4,3] is symmetric:

    1
   / \
  2   2
 / \ / \
3  4 4  3

But the following [1,2,2,null,3,null,3] is not:

    1
   / \
  2   2
   \   \
   3    3

Note:
Bonus points if you could solve it both recursively and iteratively. 
解析：
以上给出的二叉树序列是层次遍历的二叉树的序列，
所以先要根据层次序列创建二叉树；

根据层次序列创建二叉树
如方法createTreeByLevelOrder，设置一个待设置 孩子的列表，先从层次序列中移除index为0的数据，创建节点为根节点，
先将该根节点加入待设置 孩子的列表，
来个循环，只要孩子列表的长度大于0，
从层次序列中取出两个数，
一个为待设置 孩子的列表index为0的节点的左孩子，将左孩子加入待设置 孩子的列表
一个为待设置 孩子的列表index为0的节点的右孩子，，将右孩子加入待设置 孩子的列表，
移除待设置 孩子的列表index为0的节点；
重复以上循环步骤。

想要解析一棵树是否为对称，只需拿根节点的左孩子与右孩子值是否相同，
相同，根节点的左孩子为左子树，根节点的右孩子为右子树，
   用左子树的左孩子与右子树的右孩子比较，左子树的右孩子与右子树的左孩子比较，
   只有都为真时，继续递归的比较。


 */
class TreeNode
{
	public function __construct($nodevalue){
		$this->value = $nodevalue;
		$this->left = Null;
		$this->right = Null;
	}
}

function createTreeByLevelOrder($list = array()){
	$toSetChildList = [];
	if(count($list)<1){
		return;
	}
	$rootValue = array_shift($list);
	$root = new TreeNode($rootValue);
	$toSetChildList[] = $root;

	while(count($toSetChildList)>0){
		if(count($list)>0){
			$leftValue = array_shift($list);
			if($leftValue!= Null){
				$leftNode = new TreeNode($leftValue);
				$toSetChildList[0]->left = $leftNode;
				$toSetChildList[] = $leftNode;
			}
		}
		if(count($list)>0){
			$rightValue = array_shift($list);
			if($rightValue!= Null){
				$rightNode = new TreeNode($rightValue);
				$toSetChildList[0]->right = $rightNode;
				$toSetChildList[] = $rightNode;
			}
		}
		array_shift($toSetChildList);
	}
	return $root;
}


function isSymmetric($root){
	return compareTrees($root->left,$root->right);
}

function compareTrees($left,$right){
	if((!isset($left) && !isset($right)) || ($left == Null && $right == Null)) return true;
	if((isset($left) && !isset($right)) || (!isset($left) && isset($right)) 
		|| ($left == Null && $left != Null) || ($left != Null && $right == Null)) return false;
	if($left->value != $right->value){
		return false;
	}
	return (compareTrees($left->left,$right->right) && compareTrees($left->right,$right->left));

}

$list = [1,2,2,3,4,4,3];
// $list = [1,2,2,null,3,null,3];
$root = createTreeByLevelOrder($list);
print_r($root);
$validSymmetric = isSymmetric($root);
var_dump($validSymmetric);





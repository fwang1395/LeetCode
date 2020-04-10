<?php

//94. 二叉树的中序遍历
//给定一个二叉树，返回它的中序 遍历。
//
//示例:
//
//输入: [1,null,2,3]
//   1
//    \
//    2
//    /
//    3
//
//输出: [1,3,2]
//进阶: 递归算法很简单，你可以通过迭代算法完成吗？

class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { $this->val = $value; }
}

class Tree{


    public function walk($root){
        if($root == null){
            return false;
        }
        while($root!=null){
            echo $root->val."\t";
            $root = $root->next;
        }
    }
}

class solution94
{
    /**
    * @param TreeNode $root
    * @return Integer[]
    */
    function inorderTraversal($root) {
        if($root == null){
            return [];
        }
        $list = [];
        $this->inorder($root,$list);
        return $list;

    }


    function inorder($root,&$list){
        //递归
        if($root != null && $root->left != null){
            $this->inorder($root->left,$list);
        }
        $list[] = $root->val;
        if($root != null && $root->right != null){
            $this->inorder($root->right,$list);
        }
    }

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function inorderTraversal2($root) {
        $list = $this->inorder2($root);
        return $list;


    }


    function inorder2($root){
        //迭代
        $list = [];
        $splStack = new SplStack();
        while($root!= null || $splStack->isEmpty() != false){
            while($root){
                $splStack->push($root);
                $root = $root->left;
            }
            $temp = $splStack->top();
            $splStack->pop();
            $list[] = $temp->val;
            $root = $temp->right;
        }
        return $list;

    }

    /**
     * 官方题解中介绍了三种方法来完成树的中序遍历，包括：

    递归
    借助栈的迭代方法
    莫里斯遍历
    在树的深度优先遍历中（包括前序、中序、后序遍历），递归方法最为直观易懂，但考虑到效率，我们通常不推荐使用递归。

    栈迭代方法虽然提高了效率，但其嵌套循环却非常烧脑，不易理解，容易造成“一看就懂，一写就废”的窘况。而且对于不同的遍历顺序（前序、中序、后序），循环结构差异很大，更增加了记忆负担。

    因此，我在这里介绍一种“颜色标记法”（瞎起的名字……），兼具栈迭代方法的高效，又像递归方法一样简洁易懂，更重要的是，这种方法对于前序、中序、后序遍历，能够写出完全一致的代码。

    其核心思想如下：

    使用颜色标记节点的状态，新节点为白色，已访问的节点为灰色。
    如果遇到的节点为白色，则将其标记为灰色，然后将其右子节点、自身、左子节点依次入栈。
    如果遇到的节点为灰色，则将节点的值输出。
    使用这种方法实现的中序遍历如下：

    class Solution:
    def inorderTraversal(self, root: TreeNode) -> List[int]:
    WHITE, GRAY = 0, 1
    res = []
    stack = [(WHITE, root)]
    while stack:
    color, node = stack.pop()
    if node is None: continue
    if color == WHITE:
    stack.append((WHITE, node.right))
    stack.append((GRAY, node))
    stack.append((WHITE, node.left))
    else:
    res.append(node.val)
    return res
    如要实现前序、后序遍历，只需要调整左右子节点的入栈顺序即可。

    作者：hzhu212
    链接：https://leetcode-cn.com/problems/binary-tree-inorder-traversal/solution/yan-se-biao-ji-fa-yi-chong-tong-yong-qie-jian-ming/
    来源：力扣（LeetCode）
    著作权归作者所有。商业转载请联系作者获得授权，非商业转载请注明出处。
     */

    public function inorder3($root){
        list($white,$grey) = [0,1];
        $res = [];
        $stack = new SplStack();
        $stack->push([$white,$root]);
        while($stack->isEmpty() != false){
            list($color,$node) = $stack->pop();
            if($node == null){
                continue;
            }
            if($color == $white){
                $stack->push([$white,$node->right]);
                $stack->push([$grey,$node]);
                $stack->push([$white,$node->left]);
            }
            else{
                $res[] = $node->val;
            }
        }
        return $res;
    }
}

//$api = new solution94();
$treeApi = new Tree();
$tree = $treeApi->generateTree([1,null,2,3]);

var_dump($tree);
//$root=new Tr



'''[Maximum Depth of Binary Tree]

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

'''


#!/usr/bin/python
# _*_ coding=UTF-8 _*_


# Definition for a binary tree node.
class TreeNode(object):
    def __init__(self, x):
        self.val = x
        self.left = None
        self.right = None
class CreateTree(object):
    def __init__(self,preOrderList):
        self.preOrderList = preOrderList

    '''创建二叉树，返回树的根节点
    '''
    def createTree():
        preOrderList = self.preOrderList
        



class Solution(object):
    def maxDepth(self, root):
        """
        :type root: TreeNode
        :rtype: int
        """
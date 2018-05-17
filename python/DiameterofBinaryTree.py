#!/usr/bin/python
# -*- coding:UTF-8 -*-
#coding=utf-8
'''
Given a binary tree, you need to compute the length of the diameter of the tree. The diameter of a binary tree is the length of the longest path between any two nodes in a tree. This path may or may not pass through the root.

Example:
Given a binary tree 
          1
         / \
        2   3
       / \     
      4   5    
Return 3, which is the length of the path [4,2,1,3] or [5,2,1,3].

Note: The length of path between two nodes is represented by the number of edges between them.


'''


# from Queue import LifoQueue
class Solution(object):
    leafNodes=[]
    List = []
    # tempList = LifoQueue()
    tempList = []
    def __init__(self):
        pass

       # self.tempList = LifoQueue()

    # def diameterOfBinaryTree(self, root):

    def getLeafNodesRootPath(root):
        LeafNodesRootPathList = []
        leafNodes = []
        node = root
        while node:
            if isLeafNode(node):
                leafNodes.append(node)
                node = node.parent
            if hasLeftNode(node):
                node = node.leftNode
            if hasRightNode(node):
                node = node.rightNode

    def getAllLeafNodePath(self,object):
        # print  Solution.tempList
        node = object
        if node is None:
            return 0
        elif TreeNode.isLeafNode(node):
            print "isLeafNode"
            print node.value
            tempList.append(node.value)
            print tempList
            List.append(tempList)
            tempList.pop()
            # (Solution.tempList).append(node.value)
            # print Solution.tempList
            # List.append(Solution.tempList)
            # (Solution.tempList).pop()
            return 1
        else:
            print "has child"
            print node.value
            tempList.append(node.value)
            # (Solution.tempList).append(node.value)
            self.getAllLeafNodes(node.left)
            self.getAllLeafNodes(node.right)
            # (Solution.tempList).pop()
            tempList.pop()


    def getAllLeafNodes(self,object):
        node = object
        if node is None:
            return 0
        elif TreeNode.isLeafNode(node):
            print node.value
            Solution.leafNodes.append(node)
            return 1
        else:
            self.getAllLeafNodes(node.left)
            self.getAllLeafNodes(node.right)

    def diaplayNodes(self):
        print "Total leaf node"
        for leaf in Solution.leafNodes:
            print leaf.value


class TreeNode(object):
    def __init__(self,leftNode,rightNode,parentNode,value):
        self.left = leftNode
        self.right = rightNode
        self.parent = parentNode
        self.value = value
    def setParentNode(self,object):
        self.parent = object
        
    def setLeftNode(self,object):
        self.left = object

    def setRightNode(self,object):
        self.right = object

    def isLeafNode(object):
        node = object
        if node.left or node.right:
            return False
        else:
            return True

    def hasLeftNode(object):
        node = object
        if node.left:
            return True
        else:
            return False

    def hasRightNode(object):
        node = object
        if node.right:
            return True
        else:
            return False

# class Tree(object):
#     def __init__(self):
#         pass
#     def createTree()

if __name__ == "__main__":
    # treeString = ""
    left = None
    right = None
    parent = None
    K = TreeNode(left,right,parent,"K")
    J = TreeNode(left,right,parent,"J")
    C = TreeNode(left,right,parent,"C")
    G = TreeNode(left,right,parent,"G")
    A = TreeNode(left,right,parent,"A")
    B = TreeNode(left,right,parent,"B")
    E = TreeNode(left,right,parent,"E")
    F = TreeNode(left,right,parent,"F")
    D = TreeNode(left,right,parent,"D")
    H = TreeNode(left,right,parent,"H")
    I = TreeNode(left,right,parent,"I")
    L = TreeNode(left,right,parent,"L")
    M = TreeNode(left,right,parent,"M")
    N = TreeNode(left,right,parent,"N")
    # print A
    # print B

    A.setLeftNode(B)
    B.setLeftNode(D)
    D.setLeftNode(E)
    I.setLeftNode(L)
    M.setLeftNode(N)

    C.setLeftNode(G)
   

    F.setParentNode(E)
    E.setParentNode(D)
    N.setParentNode(M)
    M.setParentNode(L)
    L.setParentNode(I)
    I.setParentNode(H)
    H.setParentNode(D)
    D.setParentNode(B)
    B.setParentNode(A)
    G.setParentNode(C)
    K.setParentNode(J)
    J.setParentNode(C)
    C.setParentNode(A)



    E.setRightNode(F)
    D.setRightNode(H)
    H.setRightNode(I)
    L.setRightNode(M)
    A.setRightNode(C)
    C.setRightNode(J)
    J.setRightNode(K)

    solution = Solution()
    # solution.getAllLeafNodes(A)
    # solution.diaplayNodes()


    solution.getAllLeafNodePath(A)
    for leafPath in Solution.List:
        print leafPath
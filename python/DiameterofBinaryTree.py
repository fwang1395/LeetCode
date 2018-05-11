#!/usr/bin/python
# -*- coding:UTF-8 -*-
#coding=utf-8
class TreeNode(object):
    def __init__(self):
        self.left = None
        self.right = None
        self.parent = None
    def setParentNode(object):
        self.parent = node
        
    def setLeftNode(object):
        self.left = node

    def setRightNode(object):
        self.right = node


class Solution(object):
    leafNodes=[]
    # def __init__(self):
       

    # def diameterOfBinaryTree(self, root):

    # def getLeafNodesRootPath(root):
    #     LeafNodesRootPathList = []
    #     leafNodes = []
    #     node = root
    #     while node:
    #         if isLeafNode(node):
    #             leafNodes.append(node)
    #             node = node.parent
    #         if hasLeftNode(node):
    #             node = node.leftNode
    #         if hasRightNode(node):
    #             node = node.rightNode

    # def getAllLeafNode(root):


    def travers(self,node):
        while node:
            if isLeafNode(node):
                Solution.leafNodes.append(node)
            if hasLeftNode(node):
                node = node.leftNode
                self.travers(node)
            if hasRightNode(node):
                node = node.rightNode
                self.travers(node) 
    def diaplayNodes(self):
        print "Total leaf node" + Employee.empCount





    def isLeafNode(node):
        if node.left or node.right:
            return false
        else:
            return true

    def hasLeftNode(node):
        if node.left:
            return true
        else:
            return false

    def hasRightNode(node):
        if node.right:
            return true
        else:
            return false
if __name__ == "__main__":
    K = TreeNode()
    J = TreeNode()
    C = TreeNode()
    G = TreeNode()
    A = TreeNode()
    B = TreeNode()
    E = TreeNode()
    F = TreeNode()
    D = TreeNode()
    H = TreeNode()
    I = TreeNode()
    L = TreeNode()
    M = TreeNode()
    N = TreeNode()

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
    solution.travers(A)
    solution.diaplayNodes()
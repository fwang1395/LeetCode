# Definition for a binary tree node.
class TreeNode():
    def __init__(self, x,left,right):
        self.val = x
        self.left = left
        self.right = right

class Solution():
    def preorderTraversal(self, root):
        """
        :type root: TreeNode
        :rtype: List[int]
        """
        List = []
        List = travers(root,List)
        return Solution.List
    
    def travers(root,List)
        if root.val is not None:
            List.append(root.val)
            print root.val
        if root.left is not None:
            travers(root.left,List)
        if root.right is not None:
            travers(root.right,List)
        

if __name__ == '__main__':
    node3 = TreeNode(3,None,None)
    node2 = TreeNode(2,node3,None)
    node1 = TreeNode(1,None,node2)
    Solution().preorderTraversal(node1)
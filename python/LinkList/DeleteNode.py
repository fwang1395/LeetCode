#!/usr/bin/python
# _*_ coding=UTF_* _*_
'''
 Delete Node in a Linked List

Write a function to delete a node (except the tail) in a singly linked list, given only access to that node.

Given linked list -- head = [4,5,1,9], which looks like following:

    4 -> 5 -> 1 -> 9

Example 1:

Input: head = [4,5,1,9], node = 5
Output: [4,1,9]
Explanation: You are given the second node with value 5, the linked list
             should become 4 -> 1 -> 9 after calling your function.

Example 2:

Input: head = [4,5,1,9], node = 1
Output: [4,5,9]
Explanation: You are given the third node with value 1, the linked list
             should become 4 -> 5 -> 9 after calling your function.

Note:

    The linked list will have at least two elements.
    All of the nodes' values will be unique.
    The given node will not be the tail and it will always be a valid node of the linked list.
    Do not return anything from your function.

'''


class ListNode(object):
    def __init__(self, x):
        self.val = x
        self.next = None
    # def setNext(self,y):
    #     self.next = y
    # def getNext(self):
    #     return self.next
    # def getValue(self):
    #     return self.val

class Solution(object):
    def deleteNode(self, node):
        """
        :type node: ListNode
        :rtype: void Do not return anything, modify node in-place instead.
        """
        if node.next is not None:
            nextNode = node.next
            node.val = nextNode.val
            node.next = nextNode.next


if __name__ == '__main__':
    node3,node2,node1 = ListNode(3),ListNode(2),ListNode(1)
    node1.setNext(node2)
    node2.setNext(node3)



''' 
Remove Nth Node From End of List

Given a linked list, remove the n-th node from the end of list and return its head.

Example:

Given linked list: 1->2->3->4->5, and n = 2.

After removing the second node from the end, the linked list becomes 1->2->3->5.

Note:

Given n will always be valid.

Follow up:

Could you do this in one pass?

'''
#!/usr/bin/python
# _*_ coding=UTF-8 _*_
# Definition for singly-linked list.
# class ListNode(object):
#     def __init__(self, x):
#         self.val = x
#         self.next = None

class Solution(object):
    '''
    Runtime: 36 ms
    '''
    def removeNthFromEnd(self, head, n):
        """
        :type head: ListNode
        :type n: int
        :rtype: ListNode
        """   

        curr = head
        preferNNode = head
        new_n = 2 if n == 1 else n 
        for i in range(1,new_n):
            if curr.next is not None:
                curr = curr.next
            else:
                return []
        while curr.next is not None:
            curr = curr.next
            preferNNode = preferNNode.next
        if n > 1:
            preferNNode.val = preferNNode.next.val
            preferNNode.next = preferNNode.next.next
        else:
            preferNNode.next = None
        return head
        
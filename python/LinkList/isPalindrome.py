'''
Palindrome Linked List
Given a singly linked list, determine if it is a palindrome.

Example 1:

Input: 1->2
Output: false

Example 2:

Input: 1->2->2->1
Output: true

Follow up:
Could you do it in O(n) time and O(1) space?
'''


#!/usr/bin/python
# _*_ coding=UTF-8 _*_

# Definition for singly-linked list.
class ListNode(object):
    def __init__(self, x):
        self.val = x
        self.next = None
        
        
class Solution(object):
    def isPalindrome(self, head):
        """
        :type head: ListNode
        :rtype: bool
        """
        if head is None:
            return False
        l2=head
        l1_last,l1 = None,None
        while l2 is not None:
            l1 = l2
            temp = l2.next
            l1.next = l1_last
            l1_last = l1
            l2 = temp
            res1 = self.compareLists(l1,l2)
            res2 = False
            if l2.next is not None:
                res2 = self.compareLists(l1,l2.next)
            if res1 or res2:
                return True
        return False



    def compareLists(self,l1,l2):
        if l1 is None and l2 is not None:
            return False
        if l1 is not None and l2 is None:
            return False
        while l1 is not None or l2 is not None:
            if l1.val!=l2.val:
                return False
            l1 = l1.next
            l2 = l2.next
        return True
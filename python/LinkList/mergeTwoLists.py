'''
Merge Two Sorted Lists
Merge two sorted linked lists and return it as a new list. The new list should be made by splicing together the nodes of the first two lists.

Example:

Input: 1->2->4, 1->3->4
Output: 1->1->2->3->4->4
'''

# Definition for singly-linked list.
# class ListNode(object):
#     def __init__(self, x):
#         self.val = x
#         self.next = None
#!/usr/bin/python
# _*_ coding=UTF-8 _*_
class Solution(object):
    def mergeTwoLists(self, l1, l2):
        """
        :type l1: ListNode
        :type l2: ListNode
        :rtype: ListNode
        """
        if l1 is None or l2 is None:
            return l1 if l2 is None else l2
        newList = ListNode(-1)
        
        newListHead = newList
        while l1 is not None or l2 is not None:
            if l1 is not None and l2 is not None:
                if l1.val <= l2.val:
                    l1_next = l1.next
                    temp = l1
                    temp.next = None
                    newList.next = temp
                    newList = temp
                    l1 = l1_next
                else:
                    l2_next = l2.next
                    temp = l2
                    temp.next = None
                    newList.next = temp
                    newList = temp 
                    l2 = l2_next
            elif l1 is not None:
                l1_next = l1.next
                temp = l1
                temp.next = None
                newList.next = temp
                newList = temp
                l1 = l1_next
            elif l2 is not None:
                l2_next = l2.next
                temp = l2
                temp.next = None
                newList.next = temp
                newList = temp 
                l2 = l2_next
            else:
                break
                
                
        ret = newListHead.next
        newListHead = None
        return ret


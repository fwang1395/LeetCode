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

    '''[summary]
    这个是自己写的第一版，有点复杂了
    26 / 26 test cases passed.
    Status: Accepted
    Runtime: 376 ms
    '''
    def isPalindrome2(self, head):
        """
        :type head: ListNode
        :rtype: bool
        """
        print "head",head
        if head is None:
            return True
        l2=head
        if l2 is not None and l2.next is None:
            return True
        l1_last,l1 = None,None
        
        while l2 is not None:
            l1 = l2
            temp = l2.next
            l1.next = l1_last
            l1_last = l1
            l2 = temp
            res1 = self.compareLists(l1,l2)
            print "res1:",res1
            res2 = False
            if l2 is not None and l2.next is not None:
                res2 = self.compareLists(l1,l2.next)
            if res1 or res2:
                return True
        return False



    def compareLists(self,l1,l2):
        while l1 is not None or l2 is not None:
            if l1 is None and l2 is not None:
                return False
            if l1 is not None and l2 is None:
                return False
            if l1.val!=l2.val:
                return False
            l1 = l1.next
            l2 = l2.next
        return True
    
    def getLength(self,head):
        length = 0
        while head is not None:
            length += 1
            head = head.next
        return length
'''[summary]
这是我写的第二个版本，
[26 / 26 test cases passed.
    Status: Accepted
Runtime: 140 ms]
'''
    def isPalindrome(self, head):
        """
        :type head: ListNode
        :rtype: bool
        """
        print "head",head
        if head is None or head.next is None:
            return True
        l2=head
        l1_last,l1 = None,None
        length = self.getLength(head)
        print length
        half,remainder = length/2,length%2
        print "half：",half," remainder:",remainder
        i = 1
        while i<=half:
            l1 = l2
            temp = l2.next
            l1.next = l1_last
            l1_last = l1
            l2 = temp
            i +=1
        if remainder == 0:
            return self.compareLists(l1,l2)
        else:
            return self.compareLists(l1,l2.next)
'''sample 68 ms submission
'''

    def isPalindrome(self, head):
        """
        :type head: ListNode
        :rtype: bool
        """
        if head is None:
            return True
        slow=head
        fast=head.next
        q=[head.val]
        while fast and fast.next:
            slow=slow.next
            q.append(slow.val)
            fast=fast.next.next
        if fast is None:
            q.pop()
        while slow.next:
            slow=slow.next
            if slow.val!=q.pop():
                return False
        return True

'''sample 72 ms submission
'''
    def isPalindrome(self, head):
        """
        :type head: ListNode
        :rtype: bool
        """
        if not head or not head.next:
            return True


        node_count = 0
        curr = head

        while curr:
            node_count +=1
            curr = curr.next
            
        curr = head
        prev = None
        for _ in range(node_count/2):
            temp = curr.next
            curr.next = prev
            prev = curr
            curr = temp
            
        if node_count % 2 !=0:
            curr = curr.next

        while prev:
            if prev.val == curr.val:
                curr = curr.next
                prev = prev.next
            else:
                return False

        return True

if __name__ == "__main__":
    mylist,head = None,None
    List = [1,2,3,4,5]
    length = len(List)
    for item in range(length):
        temp = ListNode(item)
        temp.next = None
        head.next
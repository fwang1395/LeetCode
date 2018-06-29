#!/usr/bin/python
#_*_ coding=UTF-8_*_
"""Implement strStr()
  Go to Discuss
Implement strStr().

Return the index of the first occurrence of needle in haystack, or -1 if needle is not part of haystack.

Example 1:

Input: haystack = "hello", needle = "ll"
Output: 2
Example 2:

Input: haystack = "aaaaa", needle = "bba"
Output: -1
Clarification:

What should we return when needle is an empty string? This is a great question to ask during an interview.

For the purpose of this problem, we will return 0 when needle is an empty string. This is consistent to C's strstr() and Java's indexOf()."""
class Solution(object):
    """
我的有点复杂，耗时长
You are here! 
Your runtime beats 7.67 % of python submissions.
    """
    def strStr(self, haystack, needle):
        """
        :type haystack: str
        :type needle: str
        :rtype: int
        """
        len_needle = len(needle)
        len_haystack = len(haystack)
        if len_needle <1 :
            return 0
        elif len_haystack < len_needle:
            return -1
        i,j = 0,0
        while i< len_haystack and (i + len_needle) <= len_haystack:
            print "i=%d"%(i)
            plus = 0
            while j < len_needle and i< len_haystack:
                if  j < (len_needle-1) and haystack[i] == needle[j]:
                    print "if"
                    plus += 1
                    i+=1
                    j+=1
                elif j == (len_needle-1) and haystack[i] == needle[j]:
                    print "elif"
                    return i-plus
                else:
                    print "else"
                    j = 0
                    i = i+1-plus
                    break
        print i
        return -1 if (i+len_needle)>len_haystack else i
    """
    sample 30 ms submission
    """
    def strStr1(self, haystack, needle):
        """
        :type haystack: str
        :type needle: str
        :rtype: int
        """
        s = haystack
        w = needle
        l1 = len(s)
        l2 = len(w)

        #res = -1
        #ix = 0
        #ix2 = 0

        if l1 - l2 < 0:
            return -1

        for i in range(0, l1-l2+1):
            w2 = s[i:i+l2]
            #print w
            #print w2
            if w == w2:
                return i
        return -1
if __name__ == '__main__':
    solution = Solution()
    haystack = "mississippi"
    needle = "issip"
    print solution.strStr(haystack,needle)



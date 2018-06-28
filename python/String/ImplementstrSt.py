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
        i,j = 0,0
        while i< len_haystack:
            print "while i:%d--------------"%i
            plus = 0
            while j < len_needle:
                if i< len_haystack and j < (len_needle-1) and haystack[i] == needle[j]:
                    print "11111111"
                    plus += 1
                    i+=1
                    j+=1

                    print "while i=%d,j=%d,plus=%d"%(i,j,plus)
                elif i< len_haystack and j == (len_needle-1) and haystack[i] == needle[j]:
                    print "222222"
                    print "while i=%d,j=%d,plus=%d"%(i,j,plus)
                    return i-plus
                else:
                    print "333333"
                    j = 0
                    i = i+1-plus
                    print "while i=%d,j=%d,plus=%d"%(i,j,plus)
                    break
        if i>=len_haystack:
            return -1
if __name__ == '__main__':
    solution = Solution()
    haystack = "mississippi"
    needle = "issip"
    print solution.strStr(haystack,needle)



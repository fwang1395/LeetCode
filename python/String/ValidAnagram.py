#!/usr/bin/python
# _*_ coding:UTF-8 _*_
'''
 Valid Anagram
Given two strings s and t , write a function to determine if t is an anagram of s.

Example 1:

Input: s = "anagram", t = "nagaram"
Output: true
Example 2:

Input: s = "rat", t = "car"
Output: false
Note:
You may assume the string contains only lowercase alphabets.

Follow up:
What if the inputs contain unicode characters? How would you adapt your solution to such case?
'''
class Solution(object):
    '''
    34 / 34 test cases passed.
    Status: Accepted
    Runtime: 78 ms
    author:wangfei
    '''
    def isAnagram(self, s, t):
        """
        :type s: str
        :type t: str
        :rtype: bool
        """
        dict1 = self.toLetterList(s)
        dict2 = self.toLetterList(t)
        return True if cmp(dict1,dict2) == 0 else False


    def toLetterList(self,str):
        """
        :type str: str
        :rtype: list []
        """
        length = len(str)
        retDict = {}
        if length == 0:
            return retDict
        for index in range(length):
            if str[index] in retDict:
                retDict[str[index]] = retDict[str[index]] + 1
            else:
                retDict[str[index]]  = 1
        return retDict

    '''
    优秀案例sample 34 ms submission
    '''
    
    def isAnagram(self, s, t):
        """
        :type s: str
        :type t: str
        :rtype: bool
        """
        l = 'abcdefghijklmnopqrstuvwxyz'
        for i in l:
            if(s.count(i) != t.count(i)):
                return False
        return True  
if __name__ == "__main__":
    s = "anagram"
    t = "nagaram"
    solution = Solution()
    print solution.isAnagram(s,t)

    s = "anagam"
    t = "nagaram"
    solution = Solution()
    print solution.isAnagram(s,t)

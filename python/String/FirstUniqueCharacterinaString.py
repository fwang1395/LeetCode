#!/usr/bin/python
# _*_ coding:UTF-8 _*_
"""
First Unique Character in a String
  Go to Discuss
Given a string, find the first non-repeating character in it and return it's index. If it doesn't exist, return -1.

Examples:

s = "leetcode"
return 0.

s = "loveleetcode",
return 2.
Note: You may assume the string contain only lowercase letters.
"""
class Solution(object):
    '''
104 / 104 test cases passed.
Status: Accepted
Runtime: 265 ms
36.85%
    '''
    def firstUniqChar(self, s):
        """
        :type s: str
        :rtype: int
        """
        s = s.lower()
        length = len(s)
        ret,index = -1,0
        print "length:%d" % length
        while index < length:
            value = s[index]
            new_index1 = s.find(value,index+1,length)
            new_index2 =  s.find(value,0,index) if index>0 else -1
            print "index:%d,new_index1:%d,new_index2:%d"%(index,new_index1,new_index2)
            if new_index1 == -1 and new_index2 == -1:
                ret = index
                break
            index += 1
        return ret
if __name__ == '__main__':
    s2 = "ngsletnkvteldvbgjcuotbuixlksnplwobegrhcsmncrirpufjd"
    s = "cc"
    solution = Solution()
    print solution.firstUniqChar(s)
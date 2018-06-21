#!/usr/bin/python
# _*_ coding:UTF-8 _*_

'''
Given a 32-bit signed integer, reverse digits of an integer.

Example 1:

Input: 123
Output: 321
Example 2:

Input: -123
Output: -321
Example 3:

Input: 120
Output: 21
Note:
Assume we are dealing with an environment which could only store integers within the 32-bit signed integer range: [−2的31幂,  2的31幂 − 1]. For the purpose of this problem, assume that your function returns 0 when the reversed integer overflows.
'''

class Solution(object):
    def reverse(self, x):
        """
        :type x: int
        :rtype: int
        """
        if x == 0:
            return x
        flag = "-" if x<0 else ""
        string_y = str(abs(x))[::-1]
        while string_y[0] == '0':
            length = len(string_y)
            string_y = string_y[1::] if length>1 else "0"
        
        string_y = flag+string_y
        ret = int(string_y) 
        return ret if  ret >= -2147483648 and ret < 2147483648 else 0

if __name__ == '__main__':
    solution = Solution()
    x = 0
    print solution.reverse(x)


#!/usr/bin/python
# _*_ coding=UTF-8 _*_

'''
String to Integer (atoi)
  Go to Discuss
Implement atoi which converts a string to an integer.

The function first discards as many whitespace characters as necessary until the first non-whitespace character is found. Then, starting from this character, takes an optional initial plus or minus sign followed by as many numerical digits as possible, and interprets them as a numerical value.

The string can contain additional characters after those that form the integral number, which are ignored and have no effect on the behavior of this function.

If the first sequence of non-whitespace characters in str is not a valid integral number, or if no such sequence exists because either str is empty or it contains only whitespace characters, no conversion is performed.

If no valid conversion could be performed, a zero value is returned.

Note:

Only the space character ' ' is considered as whitespace character.
Assume we are dealing with an environment which could only store integers within the 32-bit signed integer range: [−2的31幂,  2的31次幂 − 1]. If the numerical value is out of the range of representable values, INT_MAX (231 − 1) or INT_MIN (−231) is returned.
Example 1:

Input: "42"
Output: 42
Example 2:

Input: "   -42"
Output: -42
Explanation: The first non-whitespace character is '-', which is the minus sign.
             Then take as many numerical digits as possible, which gets 42.
Example 3:

Input: "4193 with words"
Output: 4193
Explanation: Conversion stops at digit '3' as the next character is not a numerical digit.
Example 4:

Input: "words and 987"
Output: 0
Explanation: The first non-whitespace character is 'w', which is not a numerical 
             digit or a +/- sign. Therefore no valid conversion could be performed.
Example 5:

Input: "-91283472332"
Output: -2147483648
Explanation: The number "-91283472332" is out of the range of a 32-bit signed integer.
             Thefore INT_MIN (−231) is returned.
'''

class Solution(object):
    def myAtoi(self, str):
        """
        :type str: str
        :rtype: int
        """
        new_str = str.strip()
        print new_str
        length = len(new_str)
        number_minus_tuple = ("0","1","2","3","4","5","6","7","8","9","-","+")
        number_tuple = ("0","1","2","3","4","5","6","7","8","9")
        minus_sign = 1
        ret_num = 0
        if length < 1:
            return 0
        if new_str[0] not in number_minus_tuple:
            return 0
        for x in range(length):
            if x == 0 and  new_str[x] == "-":
                minus_sign = -1
            elif x == 0 and  new_str[x] == "+":
                minus_sign = 1
            elif new_str[x] in number_tuple:
                ret_num = ret_num * 10 + int(new_str[x])
            else:
                break
        final = ret_num * minus_sign
        print final
       
        if final < -2**31:
            return -2**31
        if final > 2**31-1:
            return 2**31-1
        return final

'''
sample 56 ms submission
'''
    def myAtoi1(self, str):
        """
        :type str: str
        :rtype: int
        """
        if len(str) == 0:
            return 0
        str = str.split()
        s = str[0]
        i = 0
        neg = 1
        if s[0] == '-' or s[0] == '+':
            i += 1
            if s[0] == '-':
                neg = -1
        y = 0
        while i < len(s):
            if ord(s[i]) < ord('0') or ord(s[i]) > ord('9'):
                break
            else:
                y = y * 10 + ord(s[i]) - ord('0')
            i += 1
        y = neg * y
        if y < -2**31:
            return -2**31
        if y > 2**31-1:
            return 2**31-1
        return y
if __name__ == '__main__':
    solution = Solution()
    test_str = "   -42afds"
    solution.myAtoi(test_str)

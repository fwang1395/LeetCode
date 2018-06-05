#!/usr/bin/python
# -*- coding: UTF-8 -*-
'''
Given a non-empty array of digits representing a non-negative integer, plus one to the integer.

The digits are stored such that the most significant digit is at the head of the list, and each element in the array contain a single digit.

You may assume the integer does not contain any leading zero, except the number 0 itself.

Example 1:

Input: [1,2,3]
Output: [1,2,4]
Explanation: The array represents the integer 123.

Example 2:

Input: [4,3,2,1]
Output: [4,3,2,2]
Explanation: The array represents the integer 4321.
'''

class Solution(object):
    def plusOne(self, digits):
        """
        :type digits: List[int]
        :rtype: List[int]
        """
        length = len(digits)

        print "length:%s"%length
        if length<1:
            return [1]
        max_index = length-1

        flag = False
        for index in range(length):
            print "index:%s"%index
            new_index = max_index - index
            print "new_index:%s"%new_index
            if new_index == max_index and new_index==0:
                if digits[new_index]<9:
                    digits[new_index] = digits[new_index] + 1
                    flag = False
                else:
                    digits[new_index] = 0
                    digits.insert(new_index,1)
                    flag = True
            elif new_index == max_index and new_index>0:
                if digits[new_index]<9:
                    digits[new_index] = digits[new_index] + 1
                    flag = False
                else:
                    digits[new_index] = 0
                    flag = True
            elif new_index > 0:
                print "elseif"
                if flag:
                    if digits[new_index]<9:
                        digits[new_index] = digits[new_index] + 1
                        flag = False
                    else:
                        flag = True
                        digits[new_index] = 0
                else:
                    continue
            else:
                print "else"
                if flag:
                    if digits[new_index]<9:
                        digits[new_index] = digits[new_index] + 1
                        flag = False
                    else:
                        flag = True
                        digits[new_index] = 0
                        digits.insert(new_index,1)
                else:
                    continue
        return digits
if __name__ == "__main__":
    solution = Solution()
    digits = [1,2,3]
    new_digits = solution.plusOne(digits)
    print new_digits

    digits = [9,9,9]
    new_digits = solution.plusOne(digits)
    print new_digits

    digits = [9]
    new_digits = solution.plusOne(digits)
    print new_digits
                    

        	


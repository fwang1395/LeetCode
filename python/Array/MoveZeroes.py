#!/usr/bin/python
# _*_ coding: UTF-8 _*_
'''
Given an array nums, write a function to move all 0's to the end of it while maintaining the relative order of the non-zero elements.

Example:

Input: [0,1,0,3,12]
Output: [1,3,12,0,0]

Note:

    You must do this in-place without making a copy of the array.
    Minimize the total number of operations.

'''
class Solution(object):
    def moveZeroes(self, nums):
        """
        :type nums: List[int]
        :rtype: void Do not return anything, modify nums in-place instead.
        """
        length = len(nums)
        j = length-1
        max_index = length-1
        for i in range(max_index):
            while nums[i] == 0 and i<j:
                print "before i=%s;nums[i]=%s"%(i,nums[i])
                nums.pop(i)
                nums.append(0)
                j -= 1
                print "after i=%s;nums[i]=%s"%(i,nums[i])
        print nums
        return nums
if __name__ == "__main__":
    solution = Solution()
    nums = [0,1,0,3,12]
    solution.moveZeroes(nums)

    nums = [0,0]
    solution.moveZeroes(nums)



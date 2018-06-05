#/usr/bin/python
# _*_ coding:UTF-8 _*_
'''
Given an array of integers, return indices of the two numbers such that they add up to a specific target.

You may assume that each input would have exactly one solution, and you may not use the same element twice.

Example:

Given nums = [2, 7, 11, 15], target = 9,

Because nums[0] + nums[1] = 2 + 7 = 9,
return [0, 1].
'''
class Solution(object):
    def twoSum(self, nums, target):
        """
        :type nums: List[int]
        :type target: int
        :rtype: List[int]
        """
        length = len(nums)
        i_index,j_index = 0,0
        for i_index in range(0,length):
            firstValue = nums[i_index]
            secondValue = target - firstValue
            for j_index in range(i_index+1,length):
                if nums[j_index] == secondValue:
                    return [i_index,j_index]
        return [i_index,j_index]
if __name__ == '__main__':
    solution = Solution()
    nums = [2,7,11,15]
    target = 9
    solution.twoSum(nums,target)

#!/usr/bin/python
# -*- coding: UTF-8 -*-
# Contains Duplicate
# Given an array of integers, find if the array contains any duplicates. Your function should return true if any value appears at least twice in the array, and it should return false if every element is distinct. 
# 
class Solution(object):
    def containsDuplicate(self, nums):
        """
        :type nums: List[int]
        :rtype: bool
        """
        flag=False
        length=len(nums)
        for indexi in range(length):
            for indexj in range(length):
                if indexi != indexj and nums[indexi] == nums[indexj]:
                    flag = True
                    break
        print flag
        return flag

    def containsDuplicate2(self, nums):
        """
        :type nums: List[int]
        :rtype: bool
        """
        flag=False
        length=len(nums)
        dict = {}
        for index in range(length):
            if  dict.has_key(nums[index]):
                flag = True
                break
            else:
                dict[nums[index]] = 1
        print flag
        return flag
if __name__ == '__main__':
    solution = Solution()
    mylist = [0,0,1,1,1,2,2,3,3,4]
    solution.containsDuplicate(mylist)
    solution.containsDuplicate2(mylist)
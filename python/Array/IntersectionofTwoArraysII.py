#!/usr/bin/python
# -*- coding: UTF-8 -*-
'''
Given two arrays, write a function to compute their intersection.

Example:
Given nums1 = [1, 2, 2, 1], nums2 = [2, 2], return [2, 2].

Note:
Each element in the result should appear as many times as it shows in both arrays.
The result can be in any order.
Follow up:
What if the given array is already sorted? How would you optimize your algorithm?
What if nums1's size is small compared to nums2's size? Which algorithm is better?
What if elements of nums2 are stored on disk, and the memory is limited such that you cannot load all elements into the memory at once?
'''
class Solution(object):
    def intersect(self, nums1, nums2):
        """
        :type nums1: List[int]
        :type nums2: List[int]
        :rtype: List[int]
        """
        nums11 = set(nums1)
        nums22 = set(nums2)
        length11 = len(nums11)
        length22 = len(nums22)
        result = []
        long_nums,short_nums = (nums11,nums22) if length11>=length22 else (nums22,nums11)
        for item in short_nums:
            count_1 = nums1.count(item)
            count_2 = nums2.count(item)
            if(count_1 > 0 and count_2>0):
                min_count = count_1 if count_2>=count_1 else count_2
                for index in range(min_count):
                    result.append(item)
        print result
        return result

if __name__ == '__main__':
    solution = Solution()
    nums1 = [1, 2, 2, 1]
    nums2 =  [2, 2]
    solution.intersect(nums1,nums2)



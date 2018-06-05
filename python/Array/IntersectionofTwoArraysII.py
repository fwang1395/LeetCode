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

'''
解析：这个问题的重点是两个list的交集的每一项可能在每个list中会重复出现多次，交集中对于这种值，需要的个数为：每个list中出现的最少次数
'''
from collections import Counter
class Solution(object):
    def intersect(self, nums1, nums2):
        """
        :type nums1: List[int]
        :type nums2: List[int]
        :rtype: List[int]
        use set and list

        """
        nums11 = set(nums1)
        nums22 = set(nums2)
        length11 = len(nums11)
        length22 = len(nums22)
        result = []
        short_nums = nums22 if length11>=length22 else nums11
        for item in short_nums:
            count_1 = nums1.count(item)
            count_2 = nums2.count(item)
            if(count_1 > 0 and count_2>0):
                min_count = count_1 if count_2>=count_1 else count_2
                for index in range(min_count):
                    result.append(item)
        print result
        return result
    def intersect2(self, nums1, nums2):
        """
        :type nums1: List[int]
        :type nums2: List[int]
        :rtype: List[int]
        use Dictionary and Counter
        """

        nums11 = Counter(nums1)
        nums22 = Counter(nums2)
        length11 = len(nums11)
        length22 = len(nums22)
        result = []
        long_nums,short_nums = (nums11,nums22) if length11>=length22 else (nums22,nums11)
        for item in short_nums:
            count_1 = nums11[item]
            count_2 = nums22[item]
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
    solution.intersect2(nums1,nums2)



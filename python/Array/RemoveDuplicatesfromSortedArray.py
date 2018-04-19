#Remove Duplicates from Sorted Array
#!/usr/bin/python
# -*- coding: UTF-8 -*-
class Solution(object):
    def removeDuplicates(self, nums):
        """
        :type nums: List[int]
        :rtype: int
        """
        if len(nums) == 0:
            return []
        prefer = None

        for index,num in enumerate(nums):
            if index == 0:
                prefer = num
                continue
            if prefer == num :
                del nums[index]
            else:
                prefer = num
        return nums
solution = Solution()
mylist = [1,1,2]
duplicateslist = solution.removeDuplicates(mylist)
print duplicateslist





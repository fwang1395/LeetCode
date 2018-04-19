# Rotate Array
# Rotate an array of n elements to the right by k steps.

# For example, with n = 7 and k = 3, the array [1,2,3,4,5,6,7] is rotated to [5,6,7,1,2,3,4].

# Note:
# Try to come up as many solutions as you can, there are at least 3 different ways to solve this problem.

# [show hint]

# Hint:
# Could you do it in-place with O(1) extra space?

# Related problem: Reverse Words in a String II

# Credits:
# Special thanks to @Freezen for adding this problem and creating all test cases.
# 


class Solution(object):
    #仅循环一次，耗时短
    def rotate(self, nums, k):
        """
        :type nums: List[int]
        :type k: int
        :rtype: void Do not return anything, modify nums in-place instead.
        """
        i=0
        length=len(nums)
        k = k%length
        temp=[]
        for x in list(xrange(length-k,length)):
            temp.append(nums[x])
        for x in list(xrange(0,length-k))[::-1]:
            nums[x+k] = nums[x]
        for index,value in enumerate(temp):
            nums[index] = value


        print nums

class Solution1(object):
    # 循环K次，时间复杂度O(k)
    def rotate(self, nums, k):
        """
        :type nums: List[int]
        :type k: int
        :rtype: void Do not return anything, modify nums in-place instead.
        """
        i=0
        length=len(nums)
        k = k%length

        # while i<k:
        #     temp = nums[length-1]
        #     for x in list(xrange(0,length-1))[::-1]:
        #         nums[x+1] = nums[x]
        #     nums[0] = temp
        #     i=i+1
        temp=[]
        for x in list(xrange(length-k,length)):
            temp.append(nums[x])
        for x in list(xrange(0,length-k))[::-1]:
            nums[x+k] = nums[x]
        for index,value in enumerate(temp):
            nums[index] = value


        print nums

class Solution2(object):
# new array to be returned.
    def rotate(self, nums, k):
        """
        :type nums: List[int]
        :type k: int
        :rtype: void Do not return anything, modify nums in-place instead.
        """
        i=k
        length=len(nums)
        newnums=[]
        for x in list(xrange(length-k,length)):
            newnums.append(nums[x])
        for x in list(xrange(0,length-k)):
            newnums.append(nums[x])
        print newnums
        return newnums

if __name__ == '__main__':
    solution = Solution()
    solution.rotate([1,2,3,4,5,6,7],3)


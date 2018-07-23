#!/usr/bin/python
# _*_ coding=UTF-8 _*_
class Solution(object):
	'''[bubbleSort]
	
	[description] 冒泡排序-升序
	
	Extends:
		object
	'''
	def bubbleSort(self,nums):
		length = len(nums)
		if length < 2:
			return nums
		for i in range(length):
			for j in range(length-i-1):
				print "iii=%s,jjjjj=%s"%(i,j)
				if nums[j] <= nums[j+1]:
					continue
				else:
					temp = nums[j]
					nums[j] = nums[j+1]
					nums[j+1] = temp
		return nums

def quicksortwithnewspace(nums):
	smaller=[];larger=[]
	if len(nums)<1:
		return nums
	print "before popup",nums
	pv=nums.pop()
	print "pop value:%d"%(pv)
	print "after pop   ",nums
	for num in nums:
		if num>pv:
			larger.append(num)
		else:
			smaller.append(num)
	print "smaller",smaller
	print "larger ",larger
	return quicksort(smaller)+[pv]+quicksort(larger)


def quick_sort(nums, left, right):
	# 快速排序
	# [6,7,8,5,1,2,11,5,4]
	if left >= right:
		return nums
	baseValue = nums[left]
	low = left
	high = right
	while left < right:
		print "while0,basevalue:",baseValue," left:",left," right:",right
		while left < right and nums[right] >= baseValue:
			right -= 1
			print "while1,left:",left," rightttt:",right
		print "before while1 change",nums
		nums[left] = nums[right]
		print "after while1 nums:",nums
		while left < right and nums[left] <= baseValue:
			left += 1
			print "while2,leftttt:",left," right:",right
		print "before while2 change",nums
		nums[right] = nums[left]
		print "after while2 nums:",nums
	nums[right] = baseValue
	quick_sort(nums, low, left - 1)
	quick_sort(nums, left + 1, high)
	return nums






if __name__ == "__main__":
	solution = Solution()
	nums = [6, 5, 3, 1, 8, 7, 2, 4]
	# print solution.bubbleSort(nums)


	nums=[5,4,3,6,7,2,9,1,2,9]
	# print quicksortwithnewspace(nums)

	test = [5,4,3,6,7,2,9,1,2,9]
	print len(test)-1
	print  quick_sort(test,0,len(test)-1)

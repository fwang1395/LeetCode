class Solution:
    def __init__(self, nums):
        """
        :type nums: List[int]
        """
        self.nums = nums
        
        

    def reset(self):
        """
        Resets the array to its original configuration and return it.
        :rtype: List[int]
        """
        return self.nums
        

    def shuffle(self):
        """
        Returns a random shuffling of the array.
        :rtype: List[int]
        """
        ret_nums = []
        count = len(self.nums)
        for num in self.nums:
            rand_key = rand(0,count);
            while rand_key in ret_nums.keys():
                rand_key = rand(0,count);
            ret_nums[rand_key] = num
        return ret_nums

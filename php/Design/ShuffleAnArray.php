<?php
/**
 *   Shuffle an Array
Shuffle a set of numbers without duplicates.

Example:

// Init an array with set 1, 2, and 3.
int[] nums = {1,2,3};
Solution solution = new Solution(nums);

// Shuffle the array [1,2,3] and return its result. Any permutation of [1,2,3] must equally likely to be returned.
solution.shuffle();

// Resets the array back to its original configuration [1,2,3].
solution.reset();

// Returns the random shuffling of array [1,2,3].
solution.shuffle();

class Solution(object):

    def __init__(self, nums):
        """
        :type nums: List[int]
        """
        

    def reset(self):
        """
        Resets the array to its original configuration and return it.
        :rtype: List[int]
        """
        

    def shuffle(self):
        """
        Returns a random shuffling of the array.
        :rtype: List[int]
        """
        


# Your Solution object will be instantiated and called as such:
# obj = Solution(nums)
# param_1 = obj.reset()
# param_2 = obj.shuffle()
 */

class Solution{
	private $list = [];
	private $ret_list = [];
	function __construct($nums){
		$this->list = $nums;
	}

	function reset(){
		return $this->list;
	}

	function shuffle(){
		$this->ret_list = $this->list;
		$count = count($this->list);
		$max_index = $count-1;
		for ($i = 0;$i<$max_index;$i++) {
			$random_key = rand($i+1,$max_index);
			$this->swap($i,$random_key);
		}
		return $this->ret_list;
	}

	function swap($index1,$index2){
		$temp = $this->ret_list[$index1];
		$this->ret_list[$index1] = $this->ret_list[$index2];
		$this->ret_list[$index2] = $temp;
	}
}	

$list = [1,2,3,4,5,6];
$solution = new Solution($list);
print_r($solution->shuffle());
print_r($solution->reset());
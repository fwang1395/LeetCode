<?php
/**
 *  Maximum Subarray
  Go to Discuss
Given an integer array nums, find the contiguous subarray (containing at least one number) which has the largest sum and return its sum.

Example:

Input: [-2,1,-3,4,-1,2,1,-5,4],
Output: 6
Explanation: [4,-1,2,1] has the largest sum = 6.
Follow up:

If you have figured out the O(n) solution, try coding another solution using the divide and conquer approach, which is more subtle.
 */


/**
 * 时间复杂度为O(n)
 * 定义两个变量res和curSum，
 * 其中res保存最终要返回的结果，即最大的子数组之和，curSum初始值为0，
 * 每遍历一个数字num，比较curSum + num和num中的较大值存入curSum，然后再把res和curSum中的较大值存入res，以此类推直到遍历完整个数组，可得到最大子数组的值存在res
 * 初始化，
 * $curr_sum = 0
 * $res = = PHP_INT_MIN
 * 循环
 * $curr_sum = max(curr_sum+nums[i] ,nums[i])
 * $res = max($res,$curr_sum);
 * return $res;
 * @Author   wangfei
 * @DateTime 2018-09-03T16:33:47+0800
 * @param    [type]                   $nums [description]
 * @return   [type]                         [description]
 */
function maxSubArray($nums){
	$curr_sum = 0;
	$res = 0-PHP_INT_MAX;
	foreach ($nums as $key => $num) {
		$curr_sum = max($num,$num+$curr_sum);
		$res = max($res,$curr_sum);
	}
	return $res;
}


/**
 * 分治法Divide and Conquer Approach来解，
 * 这个分治法的思想就类似于二分搜索法，
 * 我们需要把数组一分为二，
 * 分别找出左边和右边的最大子数组之和，
 * 然后还要从中间开始向左右分别扫描，
 * 求出的最大值分别和左右两边得出的最大值相比较取最大的那一个
 *
 * 分治的策略： 
将数组均分为两个部分，那么最大子数组会存在于：

左侧数组的最大子数组
右侧数组的最大子数组
左侧数组的以右侧边界为边界的最大子数组+右侧数组的以左侧边界为边界的最大子数组
那么就能很容易的写出分治的代码：

 * @Author   wangfei
 * @DateTime 2018-09-03T16:41:11+0800
 * @param    [type]                   $nums [description]
 * @return   [type]                         [description]
 */
function maxSubArray2($nums,$left,$right){
	if($left >= $right){
		return $nums[$right];
	}
	$mid = $left + intval(($right-$left)/2);
	$l_max = maxSubArray2($nums,$left,$mid-1);
	$r_max = maxSubArray2($nums,$mid+1,$right);
	$middle = $nums[$mid];
	for($i = $mid-1,$temp = $middle;$i >= $left;$i--){
		$temp += $nums[$i];
		$middle = max($temp,$middle);
	}
	for($j=$mid+1,$temp=$middle;$j<=$right;$j++){
		$temp += $nums[$j];
		$middle = max($middle,$temp);
	}

	echo("left:{$left},l_max:{$l_max},right:{$right},r_max:{$r_max},mid:{$mid},middle:{$middle}\n\r");
	return max($middle,max($l_max,$r_max));
}



$nums =  [-2,1,-3,4,-1,2,1,-5,4];
print_r("\n\rresult1:".maxSubArray($nums)."\n\r");

$count = count($nums);
print_r("\n\rresult2:".maxSubArray2($nums,0,$count-1));
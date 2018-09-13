<?php
/**
 * House Robber
You are a professional robber planning to rob houses along a street. Each house has a certain amount of money stashed, the only constraint stopping you from robbing each of them is that adjacent houses have security system connected and it will automatically contact the police if two adjacent houses were broken into on the same night.

Given a list of non-negative integers representing the amount of money of each house, determine the maximum amount of money you can rob tonight without alerting the police.

Example 1:

Input: [1,2,3,1]
Output: 4
Explanation: Rob house 1 (money = 1) and then rob house 3 (money = 3).
             Total amount you can rob = 1 + 3 = 4.
Example 2:

Input: [2,7,9,3,1]
Output: 12
Explanation: Rob house 1 (money = 2), rob house 3 (money = 9) and rob house 5 (money = 1).
             Total amount you can rob = 2 + 9 + 1 = 12.
解题思路：
定义两个变量，一个用来存偶数位even_max的最大值，一个用来存奇数位odd_max的最大值;
当该位置index为偶数时，比较even_max+当前偶数index对应的值与odd_max，将大的赋值给 even_max
当该位置index为奇数时，比较even_max与odd_max+当前奇数index对应的值，将大的赋值给odd_max；
伪代码如下
当$i%2 == 0 ,even_max = max(even_max+$nums[$i],odd_max)。
当$i%2 != 0 ,odd_max = max(even_max,odd_max+$nums[$i])。
最后返回even_max 和odd_max 中较大的值。
 */

function rob( $nums){
	$even_max = 0;$odd_max = 0;
	for($i=0;$i<count($nums);$i++){
		if($i%2 == 0){
			$even_max = max($even_max+$nums[$i],$odd_max);
		}
		else{
			$odd_max = max($even_max,$odd_max+$nums[$i]);
		}
	}
	return max($even_max,$odd_max);
}

$list = [2,7,9,3,1];
print_r(rob($list));
echo("\n\r");

$list =[1,2,3,1];
print_r(rob($list));
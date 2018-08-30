 <?php
/**
 *  Climbing Stairs

You are climbing a stair case. It takes n steps to reach to the top.

Each time you can either climb 1 or 2 steps. In how many distinct ways can you climb to the top?

Note: Given n will be a positive integer.

Example 1:

Input: 2
Output: 2
Explanation: There are two ways to climb to the top.
1. 1 step + 1 step
2. 2 steps

Example 2:

Input: 3
Output: 3
Explanation: There are three ways to climb to the top.
1. 1 step + 1 step + 1 step
2. 1 step + 2 steps
3. 2 steps + 1 step
总的思路
先手动推导：
f(1) = 1
f(2) = 2
f(3) = 3
f(4) = 5
f(5) = 8
f(6) = 13
.
.
.
f(n) = f(n-1) + f(n-2)

 */
//递归
function climbStairs1($n){
	if($n == 1) return 1;
	if($n == 2) return 2;
	return climbStairs1($n-1)+climbStairs1($n-2);
}

//非递归
function climbStairs($n){
	if($n == 1) return 1;
	if($n == 2) return 2;
	$i = 3;
	$i_1 = 1;
	$i_2 = 2;
	$sum = 0;
	while($i<=$n){
		$sum = $i_2+$i_1;
		$i_1 = $i_2;
		$i_2 = $sum;
		$i+=1;
	}
	return $sum;
}


print_r(climbStairs(10));


print_r(climbStairs1(10));
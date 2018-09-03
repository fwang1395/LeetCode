<?php

/**
 * Best Time to Buy and Sell Stock

Say you have an array for which the ith element is the price of a given stock on day i.

If you were only permitted to complete at most one transaction (i.e., buy one and sell one share of the stock), design an algorithm to find the maximum profit.

Note that you cannot sell a stock before you buy one.

Example 1:

Input: [7,1,5,3,6,4]
Output: 5
Explanation: Buy on day 2 (price = 1) and sell on day 5 (price = 6), profit = 6-1 = 5.
             Not 7-1 = 6, as selling price needs to be larger than buying price.

Example 2:

Input: [7,6,4,3,1]
Output: 0
Explanation: In this case, no transaction is done, i.e. max profit = 0.


 */


function maxProfit($list){
/**
        :type prices: List[int]
        :rtype: int
**/
	list($lastMaxIndex,$lastMax,$profit) = array(0,0,0);
	$count = count($list);
	for ($i=0; $i < ($count-1) ; $i++) { 
		$current = $list[$i];
		if($lastMaxIndex<=($i+1)){
			list($tempIndex ,$tempValue) = array($i+1,$list[$i+1]);
			for($j = $i+1;$j<$count;$j++){
				if($list[$j]>$tempValue){
					list($tempIndex ,$tempValue) = array($j,$list[$j]);
				}
			}
			list($lastMaxIndex,$lastMax) = array($tempIndex,$tempValue);
		}
		$tempProfit = $lastMax - $current;
		if($tempProfit>$profit){
			$profit = $tempProfit;
		}
		// print_r("current:{$current},lastMaxIndex:{$lastMaxIndex},lastMax:{$lastMax},profit:{$profit},\n\r");
	}
	return $profit;
}

/**
 * 网上找的，宗旨：
 * 初始化：
 * min_price = PHP_int_max
 * max_profit = 0；
 * 循环处理数组：
 * min_price = min(min_price,price[i])
 * max_profit = max(max_profit,price[i]-min_price)
 * @Author   wangfei
 * @DateTime 2018-09-03T15:23:00+0800
 * @return   [type]                   [description]
 */
function maxProfit1($prices){
	$count = count($prices);
	if($count<=1){
		return 0;
	}
	list($max_profit,$min_price) = array(0,PHP_INT_MAX);
	foreach ($prices as $index =>$price){
		$min_price = min($min_price,$price);
		$max_profit = max($max_profit,($price - $min_price));
	}
	return $max_profit;
}

// print_r(maxProfit([7,1,5,3,6,4]));
// print_r(maxProfit([7,6,4,3,1]));


print_r(maxProfit1([7,1,5,3,6,4]));
print_r(maxProfit1([7,6,4,3,1]));
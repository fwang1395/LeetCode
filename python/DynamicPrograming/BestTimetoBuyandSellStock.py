#!/usr/bin/python
# _*_ coding=UTF_8 _*_

''' Best Time to Buy and Sell Stock

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
'''

8

'''这个是自己写的，超时'''
def maxProfit(prices):
	"""
	:type prices: List[int]
	:rtype: int
	"""
	lastMaxIndex,lastMax,profit = 0,0,0;
	count = len(prices);
	for i in range(count-1): 
		current = prices[i];
		if lastMaxIndex<=(i+1):
			tempIndex,tempValue = i+1,prices[i+1];
			for j in range(i+1,count):
				if prices[j]>tempValue:
					tempIndex ,tempValue = j,prices[j];
			lastMaxIndex,lastMax = tempIndex,tempValue;
		tempProfit = lastMax - current;
		if tempProfit>profit:
			profit = tempProfit;
		print("current:%d,lastMaxIndex:%d,lastMax:%d,profit:%d" % (current,lastMaxIndex,lastMax,profit));
	return profit;



'''
网上找的，
'''
import sys
# max = sys.maxsize #python 3
# max = sys.maxint #python 2
# php PHP_INT_SIZE
def maxProfit3(prices):
	if not prices or len(prices) == 1:
		return 0
	maxPro = 0;
	minPrice = sys.maxint;
	for i in range(0,len(prices)):
		minPrice = min(minPrice, prices[i]);
		maxPro = max(maxPro, prices[i] - minPrice);
	return maxPro;


list1 = [7,1,5,3,6,4];
list2 = [7,6,4,3,1];

profit1 = maxProfit(list1);
print(profit1);

profit2 = maxProfit(list2);

print(profit2);

"""
Best Time to Buy and Sell Stock II
Say you have an array for which the ith element is the price of a given stock on day i.

Design an algorithm to find the maximum profit. You may complete as many transactions as you like (ie, buy one and sell one share of the stock multiple times). However, you may not engage in multiple transactions at the same time (ie, you must sell the stock before you buy again).

�����֮ǰ�ǵ�Best Time to Buy and Sell Stock ������Ʊ�����ʱ������ƣ������Ƚ����׽����������ڿ������޴���������������Ƕ�֪����������Ǯ��Ȼ�ǵͼ�����߼��׳�����ô��������ֻ��Ҫ�ӵڶ��쿪ʼ�������ǰ�۸��֮ǰ�۸�ߣ���Ѳ�ֵ���������У���Ϊ���ǿ����������룬���������������ռ۸��ߵĻ��������Խ������룬�������׳����Դ����ƣ���������������󼴿�����������

"""
class Solution(object):
    def maxProfit(self, prices):
        """
        :type prices: List[int]
        :rtype: int
        """
        length = len(prices)
        profit = 0
        
        for i in range(0, length-1):
            if prices[i]<prices[i+1]:
                profit+= prices[i+1]-prices[i]
        return profit


if __name__ == '__main__':
    prices=[3,6,4,2,10,8]
    solution = Solution()
    solution.maxProfit(prices)
class Solution(object):
    def maxProfit(self, prices):
        """
        :type prices: List[int]
        :rtype: int
        """
        length = len(prices)
        max_value=prices[length-1]
        min_value=prices[0]
        
        for i in range(0, length):
            for j in range(i+1,length)[::-1]:
                if prices[j] > max_value:
                    max_value=prices[j]
                elif prices[i] < min_value:
                    min_value=prices[i]
                else:
                    break;
        max_profit = max_value-min_value
        return max_profit
if __name__ == '__main__':
    prices=[3,6,4,2,10,8]
    solution = Solution()
    solution.maxProfit(prices)
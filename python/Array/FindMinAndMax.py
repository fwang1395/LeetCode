#!/usr/bin/python
# _*_ coding:UTF-8 -*-
# 请使用迭代查找一个list中最小和最大值，并返回一个tuple：
class Solution(object):
    def findMinAndMax(self, L):
        '''
        return (None, None)
        '''
        if len(L) == 0:
            return (None,None)
        min,max = L[0],L[0]
        for value in L:
            if max < value:
                max = value
            if min > value:
                min = value
        return (min,max)
if __name__ == "__main__":
    solution = Solution()
    # 测试
    L = []
    if solution.findMinAndMax(L) != (None, None):
        print('测试失败1!')
    else:
        print('测试成功1!')
    L = [7]
    if solution.findMinAndMax(L) != (7, 7):
        print('测试失败2!')
    else:
        print('测试成功2!')
    L = [7, 1]
    if solution.findMinAndMax(L) != (1, 7):
        print('测试失败3!')
    else:
        print('测试成功3!')
    L= [7, 1, 3, 9, 5]
    if solution.findMinAndMax(L) != (1, 9):
        print('测试失败4!')
    else:
        print('测试成功4!')
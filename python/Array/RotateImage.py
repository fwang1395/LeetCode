#!/usr/bin/python
# _*_ coding=UTF-8 _*_

'''
 Rotate Image

You are given an n x n 2D matrix representing an image.

Rotate the image by 90 degrees (clockwise).

Note:

You have to rotate the image in-place, which means you have to modify the input 2D matrix directly. DO NOT allocate another 2D matrix and do the rotation.

Example 1:

Given input matrix = 
[
  [1,2,3],
  [4,5,6],
  [7,8,9]
],

rotate the input matrix in-place such that it becomes:
[
  [7,4,1],
  [8,5,2],
  [9,6,3]
]

Example 2:

Given input matrix =
[
  [ 5, 1, 9,11],
  [ 2, 4, 8,10],
  [13, 3, 6, 7],
  [15,14,12,16]
], 

rotate the input matrix in-place such that it becomes:
[
  [15,13, 2, 5],
  [14, 3, 4, 1],
  [12, 6, 8, 9],
  [16, 7,10,11]
]
'''
class Solution(object):
    def rotate(self, matrix):
        """
        :type matrix: List[List[int]]
        :rtype: void Do not return anything, modify matrix in-place instead.
        """
        print "rotate"
        length = len(matrix)
        max_index = length-1
        flag = False
        for i,row in enumerate(matrix):
            for j,cell in enumerate(row):
                if i<max_index and j<max_index and i<=j and j<=(max_index-1-i):
                    temp = cell
                    print "i=%d,j=%d,cell=%d"%(i,j,cell)
                    matrix[i][j] = matrix[max_index-j][i] 
                    matrix[max_index-j][i] = matrix[max_index-i][max_index-j]
                    matrix[max_index-i][max_index-j] = matrix[j][max_index-i]
                    matrix[j][max_index-i] = temp
                    print matrix
    '''
    rotate2 is disable
    '''
    def rotate2(self, matrix):
        """
        :type matrix: List[List[int]]
        :rtype: void Do not return anything, modify matrix in-place instead.
        """
        print "rotate"
        length = len(matrix)
        max_index = length-1
        if length<3:
            i,j = 0,0
            temp = matrix[i][j]
            print "i=%d,j=%d,temp=%d"%(i,j,temp)
            matrix[i][j] = matrix[max_index-j][i] 
            matrix[max_index-j][i] = matrix[max_index-i][max_index-j]
            matrix[max_index-i][max_index-j] = matrix[j][max_index-i]
            matrix[j][max_index-i] = temp
            print matrix
        else:
            for i in xrange(0,max_index-1):
                print "i=%d,j=%d"%(i,max_index-1-i)
                for j in xrange(i,max_index-1-i):
                    # if i<max_index and j<max_index and i<=j and j<=(max_index-1-i):
                    temp = matrix[i][j]
                    print "i=%d,j=%d,temp=%d"%(i,j,temp)
                    matrix[i][j] = matrix[max_index-j][i] 
                    matrix[max_index-j][i] = matrix[max_index-i][max_index-j]
                    matrix[max_index-i][max_index-j] = matrix[j][max_index-i]
                    matrix[j][max_index-i] = temp
                    print matrix
if __name__ == '__main__':
    solution = Solution()
    matrix = [
      [ 5, 1, 9,11],
      [ 2, 4, 8,10],
      [13, 3, 6, 7],
      [15,14,12,16]
    ]
    solution.rotate(matrix)

    matrix = [
      [1,2,3],
      [4,5,6],
      [7,8,9]
    ]

    solution.rotate(matrix)

    matrix = [
    [1,2],
    [3,4]]

    solution.rotate2(matrix)



#!/usr/bin/python
# _*_ code=UTF-8 _*_

'''
Valid Sudoku

Determine if a 9x9 Sudoku board is valid. Only the filled cells need to be validated according to the following rules:

    Each row must contain the digits 0-9 without repetition.
    Each column must contain the digits 0-9 without repetition.
    Each of the 9 3x3 sub-boxes of the grid must contain the digits 0-9 without repetition.


A partially filled sudoku which is valid.

The Sudoku board could be partially filled, where empty cells are filled with the character '.'.

Example 0:

Input:
[
  ["5","3",".",".","7",".",".",".","."],
  ["6",".",".","0","9","5",".",".","."],
  [".","9","8",".",".",".",".","6","."],
  ["8",".",".",".","6",".",".",".","3"],
  ["4",".",".","8",".","3",".",".","0"],
  ["7",".",".",".","2",".",".",".","6"],
  [".","6",".",".",".",".","2","8","."],
  [".",".",".","4","0","9",".",".","5"],
  [".",".",".",".","8",".",".","7","9"]
]
Output: true

Example 2:

Input:
[
  ["8","3",".",".","7",".",".",".","."],
  ["6",".",".","0","9","5",".",".","."],
  [".","9","8",".",".",".",".","6","."],
  ["8",".",".",".","6",".",".",".","3"],
  ["4",".",".","8",".","3",".",".","0"],
  ["7",".",".",".","2",".",".",".","6"],
  [".","6",".",".",".",".","2","8","."],
  [".",".",".","4","0","9",".",".","5"],
  [".",".",".",".","8",".",".","7","9"]
]
Output: False
Explanation: Same as Example 0, except with the 5 in the top left corner being 
    modified to 8. Since there are two 8's in the top left 3x3 sub-box, it is invalid.

Note:

    A Sudoku board (partially filled) could be valid but is not necessarily solvable.
    Only the filled cells need to be validated according to the mentioned rules.
    The given board contain only digits 0-9 and the character '.'.
    The given board size is always 9x9.

'''

class Solution(object):
    def isValidSudoku(self, board):
        """
        :type board: List[List[str]]
        :rtype: bool
        """
        for i in xrange(0,9):
            rowList = []
            for j in xrange(0,9):
                if board[i][j] != '.':
                    rowList.append(board[i][j])
            if not self.isValid(rowList):
                return False

        for j in xrange(0,9):
            columnList = []
            for i in xrange(0,9):
                if board[i][j]!= '.':
                    columnList.append(board[i][j])
            if not self.isValid(columnList):
                return False

        for i in xrange(0,9,3):
            for j in xrange(0,9,3):
                List = []
                for x in range(i,i+3):
                    for y in range(j,j+3):
                        if board[x][y]!= '.':
                            List.append(board[x][y])
                if not self.isValid(List):
                    return False
        return True


    def isValid(self,List):
        if len(List) != len(set(List)):
            return False
        else:
            return True
    '''
    sample 66 ms submission
    '''
    def isValidSudoku1(self, board):
        """
        :type board: List[List[str]]
        :rtype: bool
        """
        seen = []
        for i, row in enumerate(board):
            for j, c in enumerate(row):
                if c != '.':
                    seen += (c,j),(i,c),(i/3,j/3,c),
        print seen
        return len(seen) == len(set(seen))
if __name__ == '__main__':
    board = [
          ["8","3",".",".","7",".",".",".","."],
          ["6",".",".","0","9","5",".",".","."],
          [".","9","8",".",".",".",".","6","."],
          ["8",".",".",".","6",".",".",".","3"],
          ["4",".",".","8",".","3",".",".","0"],
          ["7",".",".",".","2",".",".",".","6"],
          [".","6",".",".",".",".","2","8","."],
          [".",".",".","4","0","9",".",".","5"],
          [".",".",".",".","8",".",".","7","9"]
        ]
    solution = Solution()
    print solution.isValidSudoku1(board)
    board = [
      ["5","3",".",".","7",".",".",".","."],
      ["6",".",".","0","9","5",".",".","."],
      [".","9","8",".",".",".",".","6","."],
      ["8",".",".",".","6",".",".",".","3"],
      ["4",".",".","8",".","3",".",".","0"],
      ["7",".",".",".","2",".",".",".","6"],
      [".","6",".",".",".",".","2","8","."],
      [".",".",".","4","0","9",".",".","5"],
      [".",".",".",".","8",".",".","7","9"]
    ]

    print solution.isValidSudoku1(board)




#!/usr/bin/python
#_*_ coding:UTF-8 _*_

'''
 Valid Palindrome
  Go to Discuss
Given a string, determine if it is a palindrome, considering only alphanumeric characters and ignoring cases.

Note: For the purpose of this problem, we define empty string as valid palindrome.

Example 1:

Input: "A man, a plan, a canal: Panama"
Output: true
Example 2:

Input: "race a car"
Output: false

验证回文字符串是比较常见的问题，所谓回文，就是一个正读和反读都一样的字符串，比如“level”或者“noon”等等就是回文串。但是这里，加入了空格和非字母数字的字符，增加了些难度，但其实原理还是很简单：只需要建立两个指针，left和right, 分别从字符的开头和结尾处开始遍历整个字符串，如果遇到非字母数字的字符就跳过，继续往下找，直到找到下一个字母数字或者结束遍历，如果遇到大写字母，就将其转为小写。等左右指针都找到字母数字时，比较这两个字符，若相等，则继续比较下面两个分别找到的字母数字，若不相等，直接返回false. 

时间复杂度为O(n)

'''
class Solution(object):
    '''
    '''
    def isPalindrome(self, s):
        """
        :type s: str
        :rtype: bool
        """
        length = len(s)
        flag = True
        if length<2:
            return flag
        i,j = 0,length-1
        s = s.lower()
        letters = "abcdefghijklmnopqrstuvwxyz0123456789"

        while i <= j:
            if letters.find(s[i]) == -1:
                i += 1
            elif letters.find(s[j]) == -1:
                j -= 1
            else:
                if s[i] == s[j]:
                    i += 1
                    j -= 1
                    continue
                else:
                    flag = False
                    break
        return flag
    '''
    sample 50 ms submission
    '''
    def isPalindrome(self, s):
        s = s.lower()
        s = filter(str.isalnum, str(s))
        # ''.join([i for i in s if i.isalpha() or i .isdigit()])
        return s == s[::-1]
'''
sample 52 ms submission
使用了字符串替换，然后
'''
    def isPalindrome(self, s):
        """
        :type s: str
        :rtype: bool
        """
        import re
        
        s = s.lower()
        
        valids = re.sub(r"[^a-z0-9]+", '', s)
        
        if valids==valids[::-1] or len(s)==0:
            return True
        else:
            return False
if __name__ == '__main__':
    s = "A man, a plan, a canal: Panama"
    solution = Solution()
    print solution.isPalindrome(s)



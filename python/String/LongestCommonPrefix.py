'''
Longest Common Prefix

Write a function to find the longest common prefix string amongst an array of strings.

If there is no common prefix, return an empty string "".

Example 1:

Input: ["flower","flow","flight"]
Output: "fl"

Example 2:

Input: ["dog","racecar","car"]
Output: ""
Explanation: There is no common prefix among the input strings.

Note:

All given inputs are in lowercase letters a-z.
'''
#!/usr/bin/python
# _*_ coding=UTF-8 _*_
class Solution(object):
    def longestCommonPrefix(self,strs):
        """
        :type strs: List[str]
        :rtype: str
        """
        length = len(strs)
        print length
        if length < 1:return ""
        if length < 2: return strs[0]
        str0 = strs[0]
        lenstr0 = len(str0)
        max_index,index = 0,0
        while index < lenstr0:
            print "index:",index
            for each in strs:
                print "each:",each,"len each:",len(each)
                if index >= len(each):
                    max_index = index-1 if (index-1)>=1 else 1
                    print "if max_index1 ",max_index
                    return str0[0:max_index]
                elif index == 0 and str0[0:1] != each[0:1]:
                    print "elif1"
                    return ""
                elif str0[0:index+1] != each[0:index+1]:
                    print "elif2"
                    max_index = index if (index-1)>=0 else 1
                    print "max_index2 ",max_index
                    return str0[0:max_index]
                else:
                    print "else"
            index += 1
            max_index = index
            print "while max_index ",max_index
        print "return max_index:",max_index
        return str0[0:max_index] if max_index>0 else str0[0:max_index+1]

if __name__ == '__main__':  
    solution = Solution()
    strs = ["flower","flow","flight"]
    strs = ["aa","a"]
    strs = ['a','aa']
    strs = ['aa','ab']
    strs = ['aa','aa']
    print strs
    print solution.longestCommonPrefix(strs);





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
    '''
    my,Runtime: 112 ms
    '''
    def longestCommonPrefix(self,strs):
        """
        :type strs: List[str]
        :rtype: str
        """
        length = len(strs)
        if length < 1:return ""
        if length < 2: return strs[0]
        shortString = self.getShortString(strs)
        lenShort = len(shortString)
        max_index,index = 0,0
        while index < lenShort:
            print "index:",index
            for each in strs:
                if index == 0 and shortString[0:1] != each[0:1]:
                    return ""
                elif shortString[0:index+1] != each[0:index+1]:
                    max_index = index if (index-1)>=0 else 1
                    return shortString[0:max_index]
                else:
                    print "else"
            index += 1
            max_index = index
        return shortString[0:max_index] if max_index>0 else shortString[0:1]

    def getShortString(self,strs):
        shortString=strs[0]
        for str in strs:
            if len(str)>=0 and len(str)<len(shortString):
                shortString = str
        return shortString
    '''
    sample 52 ms submission
    '''
    def longestCommonPrefix1(self, strs):
        """
        :type strs: List[str]
        :rtype: str
        """
        if strs == []:
            return ""
        if len(strs) == 1:
            return strs[0]
        shortest_str = strs[0]
        shortest_i = 0
        for i,string in enumerate(strs):
            if len(string) < len(shortest_str):
                shortest_str = string
                shortest_i = i
        del strs[shortest_i]
        print strs
        matrix = defaultdict()
        for i in range(1, len(shortest_str)+1):
            matrix[shortest_str[0:i]] = 1
        if len(shortest_str) == 0:
            matrix[""] = 1
        
        print matrix
        
        for string in strs:
            for i in range(1, len(string)+1):
                if string[0:i] in matrix:
                    matrix[string[0:i]] += 1
        print matrix
        common_prefixes = max(matrix.values())
        print common_prefixes
        if common_prefixes != len(strs)+1:
            return ""
        
        longest_prefix = ""
        for k,v in matrix.iteritems():
            print k
            print v
            if v == common_prefixes and len(k) > len(longest_prefix):
                longest_prefix = k
        return longest_prefix
'''
sample 32 ms submission
'''
    def longestCommonPrefix2(self, strs):
        """
        :type strs: List[str]
        :rtype: str
        """
        if strs == []:
            return ""
        length = []      
        for xx in strs:
            length.append(len(xx))
        m = min(length)
        if m == 0:
            return ""
        #if len(strs) == 0:
         #   return ""
        if len(strs) == 1:
            return strs[0]

        i = 0
        while i < m:
            n = 1
            while n < len(strs):
                if strs[n][i] != strs[0][i]:
                    return strs[0][0:i]
                else:
                    n += 1
            i += 1
        return strs[0][0:(i)]

    '''
    sample 20 ms submission
    '''
    def longestCommonPrefix3(self, strs):
        """
        :type strs: List[str]
        :rtype: str
        """
        # result = ""
        # if not len(strs): return result
        # min_length = min(map(len, strs))
        # for i in range(min_length):
        #     char = strs[0][i]
        #     for s in strs:
        #         if s[i] != char:
        #             return result
        #     result+=char
        # return result
        
        # Optimal:
        if not strs:
            return ""
        
        for i, string in enumerate(zip(*strs)):
            if len(set(string)) > 1:
                return strs[0][:i]
        
        return min(strs)


if __name__ == '__main__':  
    solution = Solution()
    strs = ["flower","flow","flight"]
    # strs = ["aa","a"]
    # strs = ['a','aa']
    # strs = ['aa','ab']
    # strs = ['aa','aa']
   
    print strs
    print solution.longestCommonPrefix(strs);





#!/usr/bin/python
# _*_ coding: UTF-8 _*_
#Reverse String
#Write a function that takes a string as input and returns the string reversed.

# Example:
# Given s = "hello", return "olleh".
class Solution(object):
    def reverseString1(self, s):
        """
        :type s: str
        :rtype: str
        """
        length = len(s)
        ret = ""
        if length == 0:
            return ret
        k=5
        while (length - k) > 0:
            for index in range(length-k,length)[::-1]:
                ret += s[index]
            length -= k
        for index in range(length)[::-1]:
            ret += s[index]
        print ret
        return ret
    def reverseString2(self, s):
        """
        :type s: str
        :rtype: str
        """
        length = len(s)
        ret = ""
        if length == 0:
            return ret
        index = 0
        while index<length:
            print index
            newIndex = length-1-index
            ret += s[newIndex]
            index += 1
        print "final index : %s"%index
        return ret
if __name__ == "__main__":
    solution = Solution()
    s = '''A man
a plan
a cameo
Zena
Bird
Mocha
Prowel
a rave
Uganda
Wait
a lobola
Argo
Goto
Koser
Ihab
Udall
a revocation
Ebarta
Muscat
eyes
Rehm
a cession
Udella
E-boat
OAS
a mirage
IPBM
a caress
Etam
FCA
a mica
Ojai
Lebowa
Yaeger
a barge
Rab
Alsatian
a mod
Adv
a rps
Ileane
Valeta
Grenada
Hetty
Fayme
REME
HCM
Tsan
Owena
Tamar
Yompur
Isa
Nil
Lorrin
Riksdag
Mona
Ronn
O'Conner
Kirk
an okay
Nafl
Lira
Robi
Rame
FIFA
a need
Rodi
Muharram
Ober
a coma
carri
Hwang
Taos
Salado
Olfe
Camag'''
    solution.reverseString1(s)
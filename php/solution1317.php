<?php
/**
 * Created by PhpStorm.
 * User: wangfei
 * Date: 2020-03-04
 * Time: 17:06
 */

/**
 * Class Solution
 * 1317. Convert Integer to the Sum of Two No-Zero Integers

User Accepted: 3510
User Tried: 3798
Total Accepted: 3584
Total Submissions: 6251
Difficulty: Easy

Given an integer n. No-Zero integer is a positive integer which doesn't contain any 0 in its decimal representation.

Return a list of two integers [A, B] where:

A and B are No-Zero integers.
A + B = n

It's guarateed that there is at least one valid solution. If there are many valid solutions you can return any of them.



Example 1:

Input: n = 2
Output: [1,1]
Explanation: A = 1, B = 1. A + B = n and both A and B don't contain any 0 in their decimal representation.

Example 2:

Input: n = 11
Output: [2,9]

Example 3:

Input: n = 10000
Output: [1,9999]

Example 4:

Input: n = 69
Output: [1,68]

Example 5:

Input: n = 1010
Output: [11,999]



Constraints:

2 <= n <= 10^4


 */

class Solution1317 {

    /**
     * @param Integer $n
     * @return Integer[]
     */
    function getNoZeroIntegers($n) {
        if($n<2){
            return [];
        }
        do{
            $first = rand(1,$n-1);
            $second = $n-$first;
            $firstFlag = strstr(strval($first),'0');
            $secondFlag = strstr(strval($second),'0');
        }while($firstFlag !== false || $secondFlag !== false);

        return [$first,$second];

    }
}


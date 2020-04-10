<?php
/**
 * Created by PhpStorm.
 * User: wangfei
 * Date: 2020-03-04
 * Time: 17:48
 */

/**
 * Class Solution1318
 * 1318. Minimum Flips to Make a OR b Equal to c

User Accepted: 2969
User Tried: 3227
Total Accepted: 3040
Total Submissions: 5432
Difficulty: Medium

Given 3 positives numbers a, b and c. Return the minimum flips required in some bits of a and b to make ( a OR b == c ). (bitwise OR operation).
Flip operation consists of change any single bit 1 to 0 or change the bit 0 to 1 in their binary representation.



Example 1:

Input: a = 2, b = 6, c = 5
Output: 3
Explanation: After flips a = 1 , b = 4 , c = 5 such that (a OR b == c)

Example 2:

Input: a = 4, b = 2, c = 7
Output: 1

Example 3:

Input: a = 1, b = 2, c = 3
Output: 0



Constraints:

1 <= a <= 10^9
1 <= b <= 10^9
1 <= c <= 10^9


 */
class Solution1318 {

    /**
     * @param Integer $a
     * @param Integer $b
     * @param Integer $c
     * @return Integer
     */
    function minFlips($a, $b, $c) {
        $n = 0;
        echo "a\tb\tc\ta\tb\tc\ta_mod\tb_mod\tc_mod\tn\t\n";

        do{
            echo "$a\t$b\t$c\t";

            list($a_mod,$a) = $this->mod_n($a);
            list($b_mod,$b) = $this->mod_n($b);
            list($c_mod,$c) = $this->mod_n($c);
            if(($a_mod | $b_mod) != $c_mod){
                if($c_mod == 0 && $a_mod != $b_mod){
                        $n += 1;
                }
                elseif($c_mod == 0 && $a_mod == $b_mod){
                    $n += 2;
                }
                elseif($c_mod == 1){
                    $n+=1;
                }
            }
            echo "$a\t$b\t$c\t$a_mod\t$b_mod\t$c_mod\t$n\t\n";

        } while(($a+$b+$c)>0 );
        return $n;
    }

    /**
     * @param $n
     * @return array [0] 余数，【1】 商
     */
    function mod_n($n){
        return [$n%2,floor($n/2)];
    }
}
$api = new Solution1318();
$a = 8; //1000;
$b = 3; //  11;
$c = 5; // 101

$ret = $api->minFlips($a,$b,$c);
// $ret = $api->mod_n(0);
print_r($ret);
echo "\n\n";exit();
<?php

namespace leetcode;
require ("UniqueRandArray.php");

use leetcode\UniqueRandArray as UniqueRandArray;

/**
 * 给定一副牌，每张牌上都写着一个整数。

此时，你需要选定一个数字 X，使我们可以将整副牌按下述规则分成 1 组或更多组：

每组都有 X 张牌。
组内所有的牌上都写着相同的整数。
仅当你可选的 X >= 2 时返回 true。

链接：https://leetcode-cn.com/problems/x-of-a-kind-in-a-deck-of-cards
 * 解题思路：
 *      先找出最小的分组数量A0，然后遍历每一个分组，A1 与 A0 求最大公约数，如果等于1 ，返回false，
 *      如果大于1 ，则 A0 = 当前最大公约数，A0 在与 A2 求最大公约数，遵循以上逻辑。


 *
 * 一、最大公约数与最小公倍数
最大公约数，属于数论所探究的内容。
最大公约数可以通过下面的三种方法求出来。 见文档：http://note.youdao.com/noteshare?id=107a8d9e64dd35a73549c4053b47752f
最小公倍数呢，它与最大公约数的乘机为所求数之积。
比如求  x,y的最大公约数和最小公倍数
记住这个公式： x*y=最小公倍数*最大公约数
 *
 * Class solution914
 */
class solution914
{
    /**
     * @param Integer[] $deck
     * @return Boolean
     */
    function hasGroupsSizeX($deck) {
        $times = [];
        foreach ($deck as $item){
            $times[$item]++;
        }
//        var_dump($times);exit();

        sort($times);
        $count = count($times);
        if($count < 1 || ($count == 1 && $times[0]<2)){
            return false;
        }
//        var_dump($times);exit();
        if($count>1) {
            for ($index = 1; $index < $count; $index++) {
                $divisor = $this->getCommonDivisor1($times[$index], $times[0]);
//                var_dump($divisor);
                if ($divisor < 2) {
                    return false;
                } else {
                    $times[0] = $divisor;
                }
            }
        }
        return true;
    }

    /**
     * 使用辗转相除法计算
     * @param $num1
     * @param $num2
     * @return int
     */
    function getCommonDivisor1($num1,$num2)
    {
        $x = $num1>=$num2?$num1:$num2;
        $y = $num1<$num2?$num1:$num2;
        $divisor = $y;
        while($x % $y !=0){
            $divisor = $x % $y;
            $x = $y;
            $y = $divisor;
        }
        return $divisor;

    }

}

$api = new solution914();
$rankApi = new UniqueRandArray();

//$list = $rankApi->rand(40,50,20);
//$list = [3,3];
//$list = [1,1,1,1,1,0,0,0];
$list = [1,1,1,1,1,1,2,2,2,2,2,2,2,2,2,3,3,3,3,3,3,3,3];
$ret = $api->hasGroupsSizeX($list);
var_dump($ret);
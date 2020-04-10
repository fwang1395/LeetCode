<?php
namespace leetcode;

class UniqueRandArray
{

    /*
     * 随机生成不重复的N个数
    * array unique_rand( int $min, int $max, int $num )
    * 生成一定数量的不重复随机数
    * $min 和 $max: 指定随机数的范围
    * $num: 指定生成数量
    */
    public function unique_rand($min, $max, $num) {
        $count = 0;//初始化变量为0
        $list = array();  //建一个新数组
        while ($count < $num) {
            $list[] = mt_rand($min, $max);  //在一定范围内随机生成一个数放入数组中
            //去除数组中的重复值用了“翻翻法”，就是用array_flip()把数组的key和value交换两次。这种做法比用 array_unique() 快得多。
            $list = array_flip(array_flip($list));
            //将数组的数量存入变量count中
            $count = count($list);
        }
        //为数组赋予新的键名
        shuffle($list);
        return $list;
    }

    /*
     * 随机生成可重复的N个数
    * array unique_rand( int $min, int $max, int $num )
    * 生成一定数量的不重复随机数
    * $min 和 $max: 指定随机数的范围
    * $num: 指定生成数量
    */
    public function rand($min, $max, $num) {
        $count = 0;//初始化变量为0
        $list = array();  //建一个新数组
        while ($count < $num) {
            $list[] = mt_rand($min, $max);  //在一定范围内随机生成一个数放入数组中
            //去除数组中的重复值用了“翻翻法”，就是用array_flip()把数组的key和value交换两次。这种做法比用 array_unique() 快得多。
            //将数组的数量存入变量count中
            $count = count($list);
        }
        //为数组赋予新的键名
        shuffle($list);
        return $list;
    }
}


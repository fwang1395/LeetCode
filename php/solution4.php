<?php

//4. 寻找两个有序数组的中位数
//给定两个大小为 m 和 n 的有序数组 nums1 和 nums2。
//
//请你找出这两个有序数组的中位数，并且要求算法的时间复杂度为 O(log(m + n))。
//
//你可以假设 nums1 和 nums2 不会同时为空。
//
//示例 1:
//
//nums1 = [1, 3]
//nums2 = [2]
//
//则中位数是 2.0
//示例 2:
//
//nums1 = [1, 2]
//nums2 = [3, 4]
//
//则中位数是 (2 + 3)/2 = 2.5

class solution4
{
//    解题思路1：简单粗暴，先将两个数组合并，两个有序数组的合并也是归并排序中的一部分。然后根据奇数，还是偶数，返回中位数。
//              时间复杂度:O（m+n）
//    解题思路2：不真正的合并，而是用两个指针的Index用来记录合并到哪里了，合并了多少个。
//                这种耗时：（m+n）／2，所以时间复杂度也是O（m+n）。



    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        $count1 = count($nums1);
        $count2 = count($nums2);
        $left = floor(($count1+$count2+1)/2);
        $right = floor(($count1+$count2+2)/2);

//        echo "$left $right\n";exit();
//        $leftValue = $this->getMiddleNumber($nums1,0,$nums2,0,$left);
//        echo "\n result= $leftValue";exit();
//        $rightValue = $this->getMiddleNumber($nums1,0,$nums2,0,$right);
//        echo "\n result= $rightValue";exit();


        return ($this->getMiddleNumber($nums1,0,$nums2,0,$left)
                + $this->getMiddleNumber($nums1,0,$nums2,0,$right))/2;


    }

    /**
     * 查找第K个数。
     * 这里我们需要定义一个函数来在两个有序数组中找到第K个元素，下面重点来看如何实现找到第K个元素。
     * 首先，为了避免产生新的数组从而增加时间复杂度，我们使用两个变量i和j分别来标记数组nums1和nums2的起始位置。
     * 然后来处理一些边界问题，比如当某一个数组的起始位置大于等于其数组长度时，说明其所有数字均已经被淘汰了，
     * 相当于一个空数组了，那么实际上就变成了在另一个数组中找数字，直接就可以找出来了。
     * 还有就是如果K=1的话，那么我们只要比较nums1和nums2的起始位置i和j上的数字就可以了。
     * 难点就在于一般的情况怎么处理？
     * 因为我们需要在两个有序数组中找到第K个元素，为了加快搜索的速度，我们要使用二分法，
     * 对K二分，意思是我们需要分别在nums1和nums2中查找第K/2个元素，
     * 注意这里由于两个数组的长度不定，所以有可能某个数组没有第K/2个数字，
     * 所以我们需要先检查一下，数组中到底存不存在第K/2个数字，如果存在就取出来，否则就赋值上一个整型最大值。
     * 如果某个数组没有第K/2个数字，那么我们就淘汰另一个数字的前K/2个数字即可。
     * 有没有可能两个数组都不存在第K/2个数字呢，这道题里是不可能的，因为我们的K不是任意给的，而是给的m+n的中间值，
     * 所以必定至少会有一个数组是存在第K/2个数字的。
     * 最后就是二分法的核心啦，比较这两个数组的第K/2小的数字midVal1和midVal2的大小，
     * 如果第一个数组的第K/2个数字小的话，那么说明我们要找的数字肯定不在nums1中的前K/2个数字，所以我们可以将其淘汰，
     * 将nums1的起始位置向后移动K/2个，并且此时的K也自减去K/2，
     * 调用递归。
     * 反之，我们淘汰nums2中的前K/2个数字，并将nums2的起始位置向后移动K/2个，并且此时的K也自减去K/2，调用递归即可。
     * @param $nums1 第一个数组
     * @param $i  标志位，表示第一个数组$i之前的不符合要求，全部丢掉
     * @param $nums2 第二个数组
     * @param $j 标志位，表示第二个数组$j之前的不符合要求，全部丢掉
     * @param $k 查找第K个元素,查找从nums1[$i]和nums2[$j]开始的第K个元素。
     * @return mixed
     */
    function getMiddleNumber($nums1,$i,$nums2,$j,$k){
//        echo json_encode($nums1). " ".json_encode($nums2)." ";
//        echo "i= $i j=$j k= $k ";
        $count1 = count($nums1);
        $count2 = count($nums2);
        if($i>=$count1){
            return $nums2[$j+$k-1];
        }
        if($j>= $count2){
            return $nums1[$j+$k-1];
        }
        if($k == 1){
            return min($nums1[$i],$nums2[$j]);
        }
        $half1 = $i+ floor($k/2) -1;
        $half2 = $j+ floor($k/2) -1;
        $midV1 = $half1<$count1 ? $nums1[$half1]:PHP_INT_MAX;
        $midV2 = $half2<$count2 ? $nums2[$half2]:PHP_INT_MAX;

//        echo "half1=$half1 half2= $half2   midV1 = $midV1  midV2=$midV2 \n";
        if($midV1<$midV2){
            return $this->getMiddleNumber($nums1,$i+ floor($k/2),$nums2,$j,$k-floor($k/2));
        }
        else{
            return $this->getMiddleNumber($nums1,$i,$nums2,$j+ floor($k/2),$k-floor($k/2));
        }

    }

}

$solution = new solution4();
$nums1 = [1,3,5,7,9];
$nums2 = [2,4,6,8];

echo $solution->findMedianSortedArrays($nums1,$nums2);
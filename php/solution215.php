<?php

/**
 * 215. 数组中的第K个最大元素
 * 在未排序的数组中找到第 k 个最大的元素。请注意，你需要找的是数组排序后的第 k 个最大的元素，而不是第 k 个不同的元素。
 *
 * 示例 1:
 *
 * 输入: [3,2,1,5,6,4] 和 k = 2
 * 输出: 5
 * 示例 2:
 *
 * 输入: [3,2,3,1,2,4,5,5,6] 和 k = 4
 * 输出: 4
 * 说明:
 *
 * 你可以假设 k 总是有效的，且 1 ≤ k ≤ 数组的长度。
 */

class Solution215
{

    /**
     * 采用包含K个节点的最小堆。
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function findKthLargest($nums, $k)
    {
        $obj = new SplMinHeap();
        $i = 0;
        do {
            $obj->insert(array_shift($nums));
            $i++;
        } while ($i < $k);
        foreach ($nums as $item) {
            if ($item > $obj->current()) {
                $obj->extract();
                $obj->insert($item);
            }
        }
        return $obj->current();
    }

    /**
     * 采用快速排序算法【不完全排序】
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function findKthLargest2($nums, $k)
    {
        $count = count($nums);
        if ($k > $count || $k<0) {
            return null;
        }
        $this->quickSort($nums, 0, $count - 1, $k);
        return $nums[$count - $k];
    }

    public function quickSort(&$nums = [], $leftIndex = 0, $rightIndex = 0, $k = 0)
    {
        $count = count($nums);
        if ($count < 1 || $leftIndex < 0 || $rightIndex > ($count-1) || $leftIndex == $rightIndex) {
            return $nums;
        }
        $smallIndex = $this->partition($nums, $leftIndex, $rightIndex);
        if ($smallIndex < $rightIndex && $smallIndex < ($count - $k)) {
            $this->quickSort($nums, $smallIndex + 1, $rightIndex, $k);

        } elseif ($smallIndex > $leftIndex && $smallIndex > ($count - $k)) {
            $this->quickSort($nums, $leftIndex, $smallIndex - 1, $k);
        } else {
            return $nums;
        }

        return $nums;
    }

    /**
     * 分治的逻辑是
     * 一般选中最左边 $leftIndex的元素作为基准$pivot = $leftIndex,
     * 默认设一个用于交换的位置$store = $leftIndex+1，
     * 对于数组 $nums [leftIndex+1 ,$rightIndex] 每个元素$index，
     * {
     *      比较 如果：$nums[$pivot] > $nums[$index]
     *          {
     *          则：交换 $nums[$index] 与 $nums[$store];$store ++;
     *          }
     * }
     * 交换 $nums[$pivot] 与 $nums[$store-1];
     * 返回基准元素最后所在的位置$store-1
     * @param $nums
     * @param $leftIndex
     * @param $rightIndex
     * @return int 返回基准元素最后所在的位置
     */
    public function partition(&$nums, $leftIndex, $rightIndex)
    {
        $pivotIndex = $leftIndex;   // 基准值Index
        $pivotValue = $nums[$pivotIndex];   //基准值
        $storeIndex = $pivotIndex + 1;
        for ($index = $leftIndex + 1; $index <= $rightIndex; $index++) {
            if ($nums[$index] < $pivotValue) {
                $this->swap($nums, $storeIndex, $index);
                $storeIndex++;
            }
        }
        $this->swap($nums, $storeIndex - 1, $pivotIndex);
        return $storeIndex - 1;
    }

    public function swap(&$nums = [], $i, $j)
    {
        $count = count($nums);
        if ($i < $count && $i >= 0 && $j < $count && $j >= 0) {
            $temp = $nums[$i];
            $nums[$i] = $nums[$j];
            $nums[$j] = $temp;
        }
    }
}


//$nums = [7,6,5,4,3,2,1];
$nums = [1,2];
$k = 2;
$spl = new Solution215();
$ret = $spl->findKthLargest2($nums, $k);
echo $ret;
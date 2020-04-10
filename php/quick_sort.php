<?php
/**
 * 快速排序的核心：默认升序排序
 * 1 选择一个基准元素，通常是数组的第一个或者最后一个元素
 * 2 通过一趟扫描，将带排序的数组分成左右两部分，一部分比基准元素大，一部分比基准元素小，
 * 3 此时基准元素恰好在排序的位置
 * 用同样的方法，递归处理左右两部分
 *  以下是分治的伪代码。
 * for each (unsorted) partition{
 *     set first element as pivot
 *     storeIndex = pivotIndex + 1
 *     for i = pivotIndex + 1 to rightmostIndex
 *     {
 *          if element[i] < element[pivot]
 *          {
 *              swap(i, storeIndex); storeIndex++
 *          }
 *     }
 *     swap(pivot, storeIndex - 1)
 * }
 */

class SolutionQuickSort
{
    public function quickSort(&$nums = [], $leftIndex = 0, $rightIndex = 0)
    {
        if (count($nums) < 1 || $leftIndex < 0 || $rightIndex >= count($nums) || $leftIndex>= $rightIndex) {
            return null;
        }
        $smallIndex = $this->partition($nums, $leftIndex, $rightIndex);
        if ($smallIndex > $leftIndex) {
            $this->quickSort($nums, $leftIndex, $smallIndex - 1);
        }
        if ($smallIndex < $rightIndex) {
            $this->quickSort($nums, $smallIndex + 1, $rightIndex);
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
        $this->swap($nums, $storeIndex-1, $pivotIndex);
        return $storeIndex-1;
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

//$nums = [3, 44, 38, 5, 47, 15, 36, 26, 27, 2, 46, 4, 19, 50, 48];
$nums = [2];
$api = new SolutionQuickSort();
//echo json_encode($nums);
//echo "\n";
$api->quickSort($nums, 0, count($nums) - 1);

echo json_encode($nums);
<?php

namespace leetcode;

require("UniqueRandArray.php");

use leetcode\UniqueRandArray as UniqueRandArray;

/**
 * Class BinaryMaxHeap
 * 二叉大顶堆的性质：
 * 堆中某个节点的值总是不大于或不小于其父节点的值；
 * 堆总是一棵完全二叉树（下面）。
 * 将根节点最大的堆叫做最大堆或大根堆，根节点最小的堆叫做最小堆或小根堆。
 * @package leetcode
 */

class BinaryMaxHeap
{
    /**
     *              0
     *          1       2
     *    3       4   5    6
     *
     *
     *              1
     *          2       3
     *      4       5   6   7
     * because heap is binary tree 并且 每次插入数据都是从堆的末尾插入数据。所以可以使用数组来模拟堆的实现。
     * 而且堆中的每个节点的索引值J 与 其父节点的索引值I
     *      （这里默认索引从1 开始， 1 代表根结点） 可以用公式 J = 2* I 或者 J = 2*I +1。 以下采用这种方式。
     *      （这里默认索引从0 开始，0 代表根结点 ） 可以用公式 J  = 2* I +1 或者 J = 2*I+2。
     * (如果是大顶堆或者小顶堆，然后在调整顺序)。
     */


    public $heapList = [0];

    /**
     * BinaryMaxHeap constructor.
     */
    public function __construct()
    {

    }

    /**
     * 一个一个插入堆，进行调整
     * 时间复杂度 O(N*LogN)
     * @param $nums
     */
    public function create1($nums = array())
    {
        if (empty($nums) || count($nums) == 0) {
            return;
        }
        foreach ($nums as $item) {
            $this->insert($item);
        }
    }

    /**
     * 直接一个数组，从半数处递减进行以下操作：
     *      选择子节点中较大节点与当前节点比较，如果子节点较大，则交换。递归处理该子节点。
     * The input array A as it is
     * for (i = A.length/2; i >= 1; i--)
     * {
     * shiftDown(i)
     * }
     * 时间复杂度 o(N)
     * @param $nums
     */
    public function create2($nums = array())
    {
        if (empty($nums) || count($nums) == 0) {
            return;
        }
        if (!empty($nums) && is_array($nums) && count($nums) > 0) {
            $count = count($nums);
            array_unshift($nums, $count);
            // ----todo 对数组进行堆调整
            $this->heapList = $nums;
            for ($i = intval($this->heapList[0] / 2); $i >= 1; $i--) {
//                print_r($i."----------------------");
                $this->shiftDown($i);
            }
        }

    }


    /**
     * 调整索引为Index的堆，使其各层子堆也是大顶堆
     * @param $index
     */
    public function shiftDown($index)
    {
        $count = $this->count();
        do {
            $leftChild = 2 * $index;
            $rightChild = 2 * $index + 1;
            if ($rightChild <= $count) {
//                print_r("left :".$this->heapList[$leftChild]." right:".$this->heapList[$rightChild]."\n");
                $maxIndex = $this->heapList[$leftChild] > $this->heapList[$rightChild] ? $leftChild : $rightChild;
            } elseif ($leftChild <= $count) {
                $maxIndex = $leftChild;
            } else {
                break;
            }

//            print_r("before swap : $index ".$this->heapList[$index].": $maxIndex ".$this->heapList[$maxIndex]);

            if ($this->heapList[$index] < $this->heapList[$maxIndex]) {
                $this->swap($index, $maxIndex);
            }
//            print_r(" after swap : $index ".$this->heapList[$index].": $maxIndex ".$this->heapList[$maxIndex]."\n");

            $index = $maxIndex;

        } while ($index <= $count);
    }



    public function count()
    {
        return $this->heapList[0];
    }

    public function getParentIndex($index)
    {
        return intval($index / 2);
    }

    /**
     * insert 插入节点
     *  A[A.length] = v
     * i = A.length-1
     * while (i > 1 && A[parentIndex(i)] < A[i]){
     * swap(A[i], A[parentIndex(i)])
     *  }
     * @param null $num
     */
    public function insert($num = null)
    {
        $this->heapList[] = $num;
        $this->heapList[0]++;
        $count = $this->count();
        $index = $count;
        while ($index > 1 && $this->heapList[$this->getParentIndex($index)] < $this->heapList[$index]) {
            $this->swap($index, $this->getParentIndex($index));
            $index = $this->getParentIndex($index);
        }
    }

    /**
     * 获取堆顶元素：移除堆顶元素，并返回
     * @return mixed
     */
    function extractMax()
    {
        $count = $this->count();
        $index = 1;
        $temp = $this->heapList[$index];
        $this->heapList[$index] = $this->heapList[$count];
        $this->heapList[$count] = $temp;
        unset($this->heapList[$count]);
        $this->heapList[0]--;
        while ($index <= $this->heapList[0]) {
            $maxIndex = $this->heapList[2 * $index] > $this->heapList[2 * $index + 1] ? (2 * $index) : (2 * $index + 1); //$max
            if ($this->heapList[$maxIndex] > $this->heapList[$index]) {
                $this->swap($maxIndex, $index);
                $index = $maxIndex;
            } else {
                break;
            }
        }
        return $temp;
    }

    function swap($indexA, $indexB)
    {
        $temp = $this->heapList[$indexA];
        $this->heapList[$indexA] = $this->heapList[$indexB];
        $this->heapList[$indexB] = $temp;
    }


    public function heapSort()
    {
        $list = [];
        $count = $this->count();
        for ($i = 1; $i <= $count; $i++) {
            $list[] = $this->extractMax();
        }
        return $list;
    }

    public function delete($index){
        $count = $this->count();
        $temp = $this->heapList[$index];
        if($index==$count){
            unset($this->heapList[$index]);
        }
        else {
            $this->swap($index, $count);
            unset($this->heapList[$count]);
        }

        $this->heapList[0]--;
        $count = $this->count();

        while ($index <= $count) {
            $maxIndex = $this->getMaxChildIndex($index);
            if(isset($maxIndex) && $maxIndex == false) {
                break;
            }
            if ($this->heapList[$maxIndex] > $this->heapList[$index]) {
                $this->swap($maxIndex, $index);
                $index = $maxIndex;
            } else {
                break;
            }

        }
        return $temp;
    }

    public function getMaxChildIndex($index){
        $count = $this->count();
        $leftChild = 2 * $index;
        $rightChild = 2 * $index + 1;

        $maxIndex = false;
        if ($rightChild <= $count) {
            $maxIndex = $this->heapList[$leftChild] > $this->heapList[$rightChild] ? $leftChild : $rightChild;
        } elseif ($leftChild <= $count) {
            $maxIndex = $leftChild;
        }
        return $maxIndex;
    }
}

//class Node
//{
//    public $nodeValue = null;
//    public $property = null;
//    public function __construct($value=null,$property=null){
//        $this->nodeValue = $value;
//        $this->property = $property;
//    }
//}

//print_r($api->getParentIndex(7));
//exit();
//$rankApi = new UniqueRandArray();
//$list = $rankApi->unique_rand(10,100,20);
//echo json_encode($list);exit();
$list = [79, 69, 32, 77, 44, 61, 40, 27, 23, 59, 92, 74, 13, 100, 82, 46, 95, 93, 38, 60];
$api = new BinaryMaxHeap();
$api->create2($list); //O(N)
//echo json_encode($api->heapList);
//$sort = $api->heapSort(); //堆排序
//echo json_encode($sort);

//exit();

//foreach ($list as $value) {
//    $api->insert($value);
//}

echo var_export($api->heapList) . "\n";

//$api->extractMax();
$api->delete(5);
//
echo var_export($api->heapList);




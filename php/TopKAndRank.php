<?php
class QuickSort
{
    public function main($nums, $k)
    {
        $count = count($nums);
        if ($k >= $count || $k < 1) {
            return false;
        }
        $sortList = array();
        $timeList = array();
        foreach ($nums as $num) {
            if (!in_array($num,$sortList)) {
                $sortList[] = $num;
            }
            $timeList[$num]++;
        }
        $countTimes = count($timeList);
        $this->quickSort($timeList, 0, $countTimes);
        $min = ($countTimes - $k) >= 0 ? ($countTimes - $k) : 0;
        $topK = [];

        $topK = array_slice($timeList, ($countTimes - $k) >= 0 ? ($countTimes - $k) : 0, $countTimes);
        $timeListFlip = [];
        foreach ($timeList as $key=>$time){
            $timeListFlip[$time][] = $key;
        }
        foreach ($sortList as $item){
            if(in_array())
        }

        echo json_encode($timeList);

    }

    public function quickSort(&$nums = array(), $left = 0, $right = 0)
    {
        $count = count($nums);
        if ($count < 1 || $left < 0 || $right >= $count) {
            return $nums;
        }
        $pivot = $this->sort($nums, 0, $count - 1);
        if ($pivot < $right) {
            $this->quickSort($nums, $pivot + 1, $right);
        }
        if ($pivot > $left) {
            $this->quickSort($nums, $left, $pivot - 1);
        }
    }

    public function sort(&$nums, $left, $right)
    {
        $pivot = $left;
        $pivotValue = $nums[$pivot];
        $store = $left + 1;
        for ($index = $store; $index <= $right; $index++) {
            if ($nums[$index] < $pivotValue) {
                $this->swap($nums, $store, $index);
                $store++;
            }
        }
        $this->swap($nums, $pivot, $store - 1);
        return $store - 1;
    }

    public function swap(&$nums, $indexA, $indexB)
    {
        //$count = count($nums)
        //if($count){

        //}
        $temp = $nums[$indexA];
        $nums[$indexA] = $nums[$indexB];
        $nums[$indexB] = $temp;
    }
}
$api = new QuickSort();
$list = ["1","3","3","4","1","5","1"];
$k = 3;
$api->main($list,$k);
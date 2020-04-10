<?php

//按每一个柱子计算： 每一个柱子的高度方向可以接的雨水的数量 =
//    min(从当前柱子向左看的最高柱子高度, 从当前柱子向右看的最高柱子高度) - 当前柱子高度
//
//步骤：
//    1）两个数组left、right分别保存：从左往右遍历时下标i最高柱子高度，和从右往左遍历时下标i最高柱子高度。
//    2）再遍历一遍每个位置，只有当height[i]的高度，比left[i]和right[i]都要小的时候才能接住雨水（否则总有一边会漏，接不到雨水）
//    3）将所有可以接到雨水的柱子的数量加起来

class solution42
{

    public $height = [];

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height)
    {
        $this->height = $height;
        $count = count($this->height);
        $rain = 0;
        for ($index = 0; $index < $count; $index++) {
            $maxLeft = $this->max(0, $index - 1);
            $maxRight = $this->max($index + 1, $count - 1);
            $min = min($maxLeft, $maxRight);
            if ($min > $this->height[$index]) {
                $rain += $min - $this->height[$index];
            }
        }
        return $rain;
    }

    /**
     * 这种方式会多次对前次重复数据进行比较。
     * @param int $start
     * @param int $end
     * @return int|mixed
     */
    public function max1($start = 0, $end = 0)
    {
        $count = count($this->height);
        if ($start >= $count || $end >= $count || $start < 0 || $end < 0) {
            return 0;
        }
        if ($start >= $end) {
            $temp = $start;
            $start = $end;
            $end = $temp;
        }
        $max = $this->height[$start];

        for ($index = $start; $index <= $end; $index++) {
            if ($this->height[$index] > $max) {
                $max = $this->height[$index];
            }
        }
        return $max;
    }

    /**
     * 可以建两个数组left[]用来存放某个位置左边的最大值、right[]用来存放某个位置左边的最大值
     * min(left[i],right[i]) - height[i]就是本位置能存放雨水的值。
     * @param Integer[] $height
     * @return Integer
     */
    function trap2($height)
    {
        $this->height = $height;
        $count = count($this->height);
        $rain = 0;
        $leftMaxList = array_fill(0, $count, 0);
        $leftMaxList[0] = $this->height[0];
        $rightMaxList = array_fill(0, $count, 0);
        $rightMaxList[$count-1] = $this->height[$count-1];
        for ($index = 1; $index < $count; $index++) {
            $leftMaxList[$index] = ($this->height[$index] < $leftMaxList[$index - 1]) ?
                                    $leftMaxList[$index - 1] : $this->height[$index];
        }

        for ($index = $count - 2; $index >= 0; $index--) {
            $rightMaxList[$index] = ($this->height[$index] < $rightMaxList[$index + 1]) ? $rightMaxList[$index + 1] : $this->height[$index];
        }
//        echo json_encode($leftMaxList)."\n".json_encode($rightMaxList)."\n";
        for ($index = 0; $index < $count; $index++) {
            $min = min($leftMaxList[$index], $rightMaxList[$index]);
            if (($min - $this->height[$index]) < 0) {
                continue;
            } else {
                $rain += $min - $this->height[$index];
            }
        }
        return $rain;
    }

}

$api = new solution42();
//$list = [0, 1, 0, 2, 1, 0, 1, 3, 2, 1, 2, 1];
$list = [2, 0, 2];
var_dump($api->trap2($list));
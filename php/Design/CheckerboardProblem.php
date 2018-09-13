<?php
header("Content-type:text/html;charset=utf-8");

/**
 * 走方格问题
      有一个矩阵map，它每个格子有一个权值。从左上角的格子开始每次只能向右或者向下走，最后到达右下角的位置，路径上所有的数字累加起来就是路径和，返回所有的路径中最小的路径和。
给定一个矩阵map及它的行数n和列数m，请返回最小路径和。保证行列数均小于等于100.
测试样例：

[[1,2,3],[1,1,1]],2,3
返回：4
如果给定的m如下，那么路径1,3,1,0,6,1,0就是最小路径和，返回12.
1 3 5 9
8 1 3 4
5 0 6 1
8 8 4 0
解析：设dp[n][m]为走到n*m位置的路径长度，那么显而易见dp[n][m] = min(dp[n-1][m],dp[n][m-1]);
 */


function getMin($map,$row_num,$column_num){
	if (empty($map) || $row_num<0 || $column_num < 0) {
		return null;
	}
	$dp = array();
	for ($i=0; $i <$row_num ; $i++) {
		$temp = 0;
		for ($j=0; $j <= $i ; $j++) { 
			$dp[$i][0] += ($j-1)>=0?($dp[$j-1][0]+$map[$j][0]):$map[$j][0];
		}
		
	}

	for ($j=0; $j <$column_num ; $j++) {
		for ($i=0; $i <= $j; $i++) { 
			$dp[0][$j] += $map[0][$i];
		} 
		
	}

	for ($i=0; $i < $row_num; $i++) { 
		for ($j=0; $j < $column_num ; $j++) {
			$min = min($dp[$i][$j-1],$dp[$i-1][$j]);
			$dp[$i][$j] = $min + $map[$i][$j];
		}
	}
	var_dump($dp);
	error_log(json_encode($dp));
	return $dp[$row_num-1][$column_num -1];
}

$map=[
[1,3,5,9],
[8,1,3,4],
[5,0,6,1],
[8,8,4,0]
];

$row_num = 1;
$column_num = 4;
print_r(getMin($map,$row_num,$column_num));


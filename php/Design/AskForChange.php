<?php
header("Content-type:text/html;charset=utf-8");
/**
 * 有数组penny，penny中所有的值都为正数且不重复。每个值代表一种面值的货币，每种面值的货币可以使用任意张，再给定一个整数aim(小于等于1000)代表要找的钱数，求换钱有多少种方法。
给定数组penny及它的大小(小于等于50)，同时给定一个整数aim，请返回有多少种方法可以凑成aim。
测试样例：
[1,2,4],3,3
返回：2

解析：设dp[n][m]为使用前n中货币凑成的m的种数，那么就会有两种情况：

             使用第n种货币：dp[n-1][m]+dp[n-1][m-peney[n]]

              不用第n种货币：dp[n-1][m]，为什么不使用第n种货币呢，因为penney[n]>m。

        这样就可以求出当m>=penney[n]时 dp[n][m] = dp[n-1][m]+dp[n][m-peney[n]]，否则，dp[n][m] = dp[n-1][m]

代码如下：
 */

/**
 * 有数组penny，penny中所有的值都为正数且不重复。每个值代表一种面值的货币，每种面值的货币可以使用任意张，再给定一个整数aim(小于等于1000)代表要找的钱数，求换钱有多少种方法。
给定数组penny及它的大小(小于等于50)，同时给定一个整数aim，请返回有多少种方法可以凑成aim。
测试样例：
[1,2,4],3,3
返回：2

解析：设dp[n][m]为使用前n种货币凑成的m的种数，那么就会有两种情况：

             使用第n种货币：dp[n-1][m]+dp[n-1][m-peney[n]]

              不用第n种货币：dp[n-1][m]，为什么不使用第n种货币呢，因为penney[n]>m。

        这样就可以求出当m>=penney[n]时 dp[n][m] = dp[n-1][m]+dp[n][m-peney[n]]，否则，dp[n][m] = dp[n-1][m]

代码如下：
 */

/**
 * [count_ways description]
 * @Author   wangfei
 * @DateTime 2018-09-13T17:07:00+0800
 * @param    array                    $peney [数组penny，penny中所有的值都为正数且不重复。每个值代表一种面值的货币，每种面值的货币可以使用任意张]
 * @param    integer                  $n     [使用前n种货币]
 * @param    integer                  $aim   [要凑的全部钱]
 * @return   [type]                          [description]
 */
function count_ways($peney=array(),$n=1,$aim=100){
	if (empty($peney) || empty($n) || empty($aim)) {
		return 0;
	}
	$dp = array();
	for($i = 0;$i<$n;$i++){
		$dp[$i][0] = 1;
	}

	for ($j=1; $peney[0] * $j <= $aim ; $j++) { 
		$dp[0][$peney[0]*$j] = 1; 
	}

	for ($i=1; $i < $n ; $i++) { 
		//这里的$j其实相当于总钱数
		for ($j=0; $j <= $aim ; $j++) { 
			if ($j > $peney[$i]) {
				$dp[$i][$j] = $dp[$i-1][$j] + $dp[$i-1][$j-$peney[$i]];
			}
			else{
				$dp[$i][$j] = $dp[$i-1][$j];
			}
		}
	}
	var_dump($dp);
	return $dp[$n-1][$aim];
}

$peney = [1,2,3,5,7,11];
$aim = 6;
$n=6;

print_r(count_ways($peney,$n,$aim));

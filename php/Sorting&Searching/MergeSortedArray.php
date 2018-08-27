<?php
/**
 * Merge Sorted Array
 Given two sorted integer arrays nums1 and nums2, merge nums2 into nums1 as one sorted array.

Note:

    The number of elements initialized in nums1 and nums2 are m and n respectively.
    You may assume that nums1 has enough space (size that is greater or equal to m + n) to hold additional elements from nums2.

Example:

Input:
nums1 = [1,2,3,0,0,0], m = 3
nums2 = [2,5,6],       n = 3

Output: [1,2,2,3,5,6]
 */


function merge($nums1, $m, $nums2, $n){
	$count1 = count($nums1);
	$count2 = count($nums2);
	if($m > $count1 || $n > $count2){
		return [];
	}
	$count_all = $m + $n;
	$index_i=$count_all-1;
	$i=$m-1;$j = $n-1;
	while($i>=0 && $j>=0 && $index_i>=0){
		if($nums1[$i] <= $nums2[$j]){
			$nums1[$index_i] = $nums2[$j];
			$index_i-=1;
			$j -=1;
		}
		else{
			$nums1[$index_i] = $nums1[$i];
			$index_i-=1;
			$i -=1;
		}
	}
	$count = count($nums1);
	array_splice($nums1,$m+$n,$count);
	return $nums1;
}

$nums1 = [1,2,3,4,5,6]; 
$m = 3;
$nums2 = [2,5,6];
$n = 3;
print_r(merge($nums1,$m,$nums2,$n));

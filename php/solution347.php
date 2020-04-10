<?php

/**
 * 1：题目描述
Given a non-empty array of integers, return the k most frequent elements.

Example 1:

Input: nums = [1,1,1,2,2,3], k = 2
Output: [1,2]
Example 2:

Input: nums = [1], k = 1
Output: [1]
 */

class Solution347 {

    function getTopK($topK = 10,$list=[]){
        $obj=new SplMinHeap();
        foreach ($list as $item){
            if($obj->count()<$topK){
                $obj->insert($item);
            }
            if($obj->count()$topK){
                $obj->insert($item);
            }
            elseif($obj->current() < $item){

            }
        }
        $obj->insert( 4 );
        $obj->insert( 8 );
        $obj->insert( 1 );
        $obj->insert( 0 );
        echo $obj->current();
    }

}





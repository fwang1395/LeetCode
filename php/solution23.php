<?php

//23. 合并K个排序链表
//合并 k 个排序链表，返回合并后的排序链表。请分析和描述算法的复杂度。
//
//示例:
//
//输入:
//[
//    1->4->5,
//  1->3->4,
//  2->6
//]
//输出: 1->1->2->3->4->4->5->6
//假设:n 是所有链表中元素的总和，k 是链表个数
//方案1：小顶堆，可以将$lists中全部节点放到小顶堆里，然后弹出堆顶元素，构造合并后的排序列表。
//    时间复杂度：
//        遍历节点，创建数组：O(n);
//        创建堆：数组转堆：O(N);
//        出堆并创建链表：



/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

class solution23
{
    /**
     * @param ListNode[] $lists
     * @return ListNode
     */
    function mergeKLists($lists) {

    }
}
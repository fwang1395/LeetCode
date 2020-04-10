<?php


/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val)
    {
        $this->val = $val;
    }
}

class Solution21 {

    /**
     * 使用修改指向，合并链表：时间复杂度O（m+n)  空间复杂度：O(1);
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2) {
        //该方法是采用while循环来实现的。
        $phead = new ListNode(-1);
        $prehead = $phead;
        while($l1 !== null && $l2 !== null){
            if($l1->val < $l2->val){
                $prehead->next = $l1;
                $l1 = $l1->next;
            }
            else{
                $prehead->next = $l2;
                $l2 = $l2->next;
            }
            $prehead = $prehead->next;
        }
        if($l1 !== null && $l2 == null){
            $prehead->next = $l1;
        }
        elseif($l1 == null && $l2 !== null){
            $prehead->next = $l2;
        }
        return $phead->next;
    }

    /**
     * 使用修改指向，合并链表：时间复杂度O（m+n)  空间复杂度：O(1);
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists2($l1, $l2) {
        //递归
        if($l1 == null){
            return $l2;
        }
        if($l2 == null){
            return $l1;
        }
        if($l1->val < $l2->val){
            $l1->next = $this->mergeTwoLists2($l1->next,$l2);
            return $l1;
        }
        else{
            $l2->next = $this->mergeTwoLists2($l1,$l2->next);
            return $l2;
        }
    }
}

class LinkList{
    public function generateLinkList($list = []){
        if(count($list) == 0){
            return null;
        }
        $linkList = new ListNode(-1);

        $preL1 = $linkList;
        foreach ($list as $item) {
            $node = new ListNode($item);
            $preL1->next = $node;
            $preL1 = $preL1->next;
        }

        return $linkList->next;
    }

    public function walk($root){
        if($root == null){
            return false;
        }
        while($root!=null){
            echo $root->val."\t";
            $root = $root->next;
        }
    }
}
$list1 = [1,3,5,6,8,9];
$list2 = [2,4,6,7,10];
$linkListApi = new LinkList();

$lList1 = $linkListApi->generateLinkList($list1);
$lList2 = $linkListApi->generateLinkList($list2);


$api = new Solution21();

//$merged1 = $api->mergeTwoLists($lList1,$lList2);
$merged2 = $api->mergeTwoLists2($lList1,$lList2);

//$linkListApi->walk($merged1);
echo "\n";
$linkListApi->walk($merged2);
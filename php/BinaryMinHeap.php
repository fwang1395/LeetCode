<?php
class BinaryMinHeap
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
     *      （这里默认索引从1 开始， 1 代表根结点） 可以用公式 J = 2* I 或者 J = 2*I +1。
     *      （这里默认索引从0 开始，0 代表根结点 ） 可以用公式 J  = 2* I +1 或者 J = 2*I+2。
     * (如果是大顶堆或者小顶堆，然后在调整顺序)。
     */


    public $heapList = [];

    /**
     * insert 插入节点
     *  A[A.length] = v
        i = A.length-1
        while (i > 1 && A[parent(i)] < A[i]){
            swap(A[i], A[parent(i)])
     *  }
     * @param null $node
     */
    function insert($node = null){

        $this->heapList[] = $node;

    }

    function delete(){

    }

    function

}

class Node
{
    public $nodeValue = null;
    public $property = null;
    public function __construct($value=null,$property=null){
        $this->nodeValue = $value;
        $this->property = $property;
    }
}

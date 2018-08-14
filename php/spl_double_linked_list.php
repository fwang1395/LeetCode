<?php
// $a = new SplDoublyLinkedList;
// $arr=[1,2,3,4,5,6,7,8,9];

// for($i=0;$i<count($arr);$i++){
//     $a->add($i,$arr[$i]);
// }
// print_r($a);

// $a->add(6,100);

// print_r($a);


$splList = new SplDoublyLinkedList();

$splList->add(0,"b");
$splList->add(1,"d");

print_r($splList);

$count = $splList->count();
print_r("count:${count}");

$splList->push('e');
$splList->unshift("a");

// $count = $splList->count();
// print_r("count:${count}");
print_r($splList);


$splList->add(2,"c");
print_r($splList);

$splList->rewind();
while ($splList->valid()) {
    print_r($splList->key());
    echo "\n";
    print_r($splList->current());
    echo "\n";
    $splList->next();
}
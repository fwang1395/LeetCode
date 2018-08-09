<?php
// phpinfo();
// 实例
    // $array = array(
    //          "a",
    //          "b",
    //     6 => "c",
    //          "d",
    //     "abc" =>"e",
    //         "f",
    //     "foo" => "bar",
    //     42    => 24,
    //     "multi" => array(
    //          "dimensional" => array(
    //              "array" => "foo"
    //          )
    //     ),
    //     3 => 'g',
    //     'h',
    // );
    // var_dump($array);

// // echo $array[3];
// echo array_key_exists(3,$array)?1:2;
// echo $array{9}?$array{9}:"None";
// 

// 实例二
// $array = array(
//     1    => "a",
//     "1"  => "b",
//     2.8  => "c",
//     true => "d",
// );
// var_dump($array);


// 实例三
// 创建一个简单的数组
// $array = array(1, 2, 3, 4, 5);
// print_r($array);// 现在删除其中的所有元素，但保持数组本身不变:
// foreach ($array as $i => $value) {
//     unset($array[$i]);
// }
// print_r($array);// 添加一个单元（注意新的键名是 5，而不是你可能以为的 0）
// $array[] = 6;
// print_r($array);
// // 重新索引：
// $array = array_values($array);
// $array[] = 7;
// print_r($array);



// 实例四
// Note:

// unset() 函数允许删除数组中的某个键。但要注意数组将不会重建索引。如果需要删除后重建索引，可以用 array_values() 函数。


// $a = array(1 => 'one', 2 => 'two', 3 => 'three');
// var_dump($a);
//  $a = array(1 => 'one', 3 => 'three'); 
// unset($a[2]);
// var_dump($a);
/* will produce an array that would have been defined as
$a = array(1 => 'one', 3 => 'three');
and NOT
$a = array(1 => 'one', 2 =>'three');
*/

// $b = array_values($a);
// var_dump($b);
// Now $b is array(0 => 'one', 1 =>'three')
// 
// 
// 

// 实例五
// Show all errors
// error_reporting(E_ALL);

// $arr = array('fruit' => 'apple', 'veggie' => 'carrot');

// // Correct
// print $arr['fruit']."\n";  // apple
// print $arr['veggie']."\n"; // carrot

// // Incorrect.  This works but also throws a PHP error of level E_NOTICE because
// // of an undefined constant named fruit
// // 
// // Notice: Use of undefined constant fruit - assumed 'fruit' in...
// // print $arr[fruit]."\n";    // apple

// // This defines a constant to demonstrate what's going on.  The value 'veggie'
// // is assigned to a constant named fruit.
// define('fruit', 'veggie');

// // Notice the difference now
// print $arr['fruit']."\n";  // apple
// print $arr[fruit]."\n";    // carrot

// // The following is okay, as it's inside a string. Constants are not looked for
// // within strings, so no E_NOTICE occurs here
// print "Hello $arr[fruit]"."\n";      // Hello apple

// // With one exception: braces surrounding arrays within strings allows constants
// // to be interpreted
// print "Hello {$arr[fruit]}"."\n";    // Hello carrot
// print "Hello {$arr['fruit']}"."\n";  // Hello apple

// // This will not work, and will result in a parse error, such as:
// // Parse error: parse error, expecting T_STRING' or T_VARIABLE' or T_NUM_STRING'
// // This of course applies to using superglobals in strings as well
// // print "Hello $arr['fruit']";
// // print "Hello $_GET['foo']";

// // Concatenation is another option
// print "Hello " . $arr['fruit']."\n"; // Hello apple
// 
// 
// 实例六
// 转换为数组
// class A {
//     private $A; // This will become '\0A\0A'
// }

// class B extends A {
//     private $A; // This will become '\0B\0A'
//     public $AA; // This will become 'AA'
// }

// var_dump((array) new B());


// 实例七,在循环中改变单元,引用传递.
// $colors = array('red', 'blue', 'green', 'yellow');
// foreach ($colors as $color) {
//     echo "Do you like $color?\n";
// }

// $colors = array('red', 'blue', 'green', 'yellow');
// foreach ($colors as &$color) {
//     $color = strtoupper($color);
// }
// var_dump($colors);

// $colors = array('red', 'blue', 'green', 'yellow');
// foreach ($colors as $key => $color) {
//     $colors[$key] = strtoupper($color);
// }
// var_dump($colors);
// 
// 
// 实例八,fill an array with all items from a directory
// $handle = opendir('.');
// while (false !== ($file = readdir($handle))) {
//     $files[] = $file;
// }
// closedir($handle); 
// var_dump($files);
// 
// 
// 
// 实例九，表达式作为数组的key也是可以的
// $k = "abc";
//  $a = array(
//     1     =>0,
//     1+1   =>1,
//     $k    =>2,
//     $k.'4'=>3,
//   );

//  var_dump($a);

// 实例十，表达式作为数组的key也是可以的
// $a  = array(1 => 'a', 'b', 'd');
// print_r($a);
// array_splice($a,2,0,'c');
// var_dump($a);

// 布尔值
// echo true != "false"?"1":"2"; //2

// echo false ; //什么也没有
// echo (false) ;//什么也没有
// echo false+false ;//0
// echo (false+false) ;//0
// echo intval(false) ;//0
// echo '"'.false.'"' ;// ""

// echo true ; //1
// echo (true) ;//1
// echo true+true ; //2
// echo (true+true) ;//什么也没有
// echo intval(true) ;//1
// echo '"'.true.'"' ;// "1"
// 32 位系统下的整数溢出
// $large_number = 2147483647;
// var_dump($large_number);                     // int(2147483647)

// $large_number = 2147483648;
// var_dump($large_number);                     // float(2147483648)

// $million = 1000000;
// $large_number =  50000 * $million;
// var_dump($large_number);                     // float(50000000000)

// Example #3 64 位系统下的整数溢出
// $large_number = 9223372036854775807;
// var_dump($large_number);                     // int(9223372036854775807)

// $large_number = 9223372036854775808;
// var_dump($large_number);                     // float(9.2233720368548E+18)

// $million = 1000000;
// $large_number =  50000000000000 * $million;
// var_dump($large_number); 


// $x = 8 - 6.4;  // which is equal to 1.6
// $y = 1.6;
// var_dump($x);
// var_dump($y);
// $z = $x - $y;
// var_dump( $z);
// var_dump($x == $y); // is not true


// Example #6 Nowdoc 结构字符串示例
// $str = <<<'EOD'
// Example of string
// spanning multiple lines
// using nowdoc syntax.
// EOD;

/* 含有变量的更复杂的示例 */
// class foo
// {
//     public $foo;
//     public $bar;

//     function foo()
//     {
//         $this->foo = 'Foo';
//         $this->bar = array('Bar1', 'Bar2', 'Bar3');
//     }
// }

// $foo = new foo();
// $name = 'MyName';
/**
 * Nowdoc 结构
 * 就象 heredoc 结构类似于双引号字符串，Nowdoc 结构是类似于单引号字符串的。
 * Nowdoc 结构很象 heredoc 结构，但是 nowdoc 中不进行解析操作。
 * 这种结构很适合用于嵌入 PHP 代码或其它大段文本而无需对其中的特殊字符进行转义
 */
// echo <<<'EOT'
// My name is "$name". I am printing some $foo->foo.
// Now, I am printing some {$foo->bar[1]}.
// This should not print a capital 'A': \x41
// EOT;
/**
 * My name is "$name". I am printing some $foo->foo.
 * Now, I am printing some {$foo->bar[1]}.
 * This should not print a capital 'A': \x41
 */

/**
 * Heredoc 结构就象是没有使用双引号的双引号字符串，这就是说在 heredoc 
 * 结构中单引号不用被转义，但是上文中列出的转义序列还可以使用。
 * 变量将被替换，但在 heredoc 结构中含有复杂的变量时要格外小心。
 * Heredoc 结构用在函数参数中来传递数据：
 */

// echo <<<EOT
// My name is "$name". I am printing some $foo->foo.
// Now, I am printing some {$foo->bar[1]}.
// This should print a capital 'A': \x41
// EOT;

/**
 * My name is "MyName". I am printing some Foo.
 * Now, I am printing some Bar2.
 * This should print a capital 'A': A
 */


/**
 * 当字符串用双引号或 heredoc 结构定义时，其中的变量将会被解析。
 * 这里共有两种语法规则：一种简单规则，一种复杂规则。
 * 简单的语法规则是最常用和最方便的，它可以用最少的代码在一个 string 中嵌入一个变量，
 * 一个 array 的值，或一个 object 的属性。
 * 复杂规则语法的显著标记是用花括号包围的表达式。
 * 简单语法
 * 当 PHP 解析器遇到一个美元符号（$）时，它会和其它很多解析器一样，去组合尽量多的标识以形成一个合法的变量名。可以用花括号来明确变量名的界线。
 */

// $juice = "apple";

// echo "He drank some $juice juice.".PHP_EOL; //He drank some apple juice.
// echo "He drank some juice made of $juices.";//He drank some juice made of .
// // Invalid. "s" is a valid character for a variable name, but the variable is $juice.

// $name = "wangfei";
// echo "This is the value of the var named $name: {${$name}}"; //这里的{${$name}}不会正确解析

#可以在字符串中用此语法通过变量来调用类的属性。
// class foo {
//     var $bar = 'I am bar.';
// }

// $foo = new foo();
// $bar = 'bar123456';
// $baz = array('foo', 'bar', 'baz', 'quux');
// // echo "{$foo->bar}\n"; //I am bar.



// Note: empty array is converted to null by non-strict equal '==' comparison. Use is_null() or '===' if there is possible of getting empty array.

// $a = array();

// print $a == null?true:false; // <== return true,1
// print $a === null?1:2; //< == return false,2
// print is_null($a)?1:2;// <== return false,2

//使用 (unset) $var 将一个变量转换为 null 将不会删除该变量或 unset 其值。仅是返回 NULL 值而已。
// $unset_null_var = "10";
// // print $unset_null_var."\n"; //10
// $test = (unset)$unset_null_var;
// print $test; //什么也不输出
// print $unset_null_var."\n"; //$unset_null_var 的值还是10
// 
// 
// 
// $var = "foo";
// $ref1 =& $var; // new object that references $var
// $ref2 =& $ref1; // references $var directly, not $ref1!!!!!
// echo $var."\n"; // >foo

// unset($var);
// echo $ref1."\n"; // >fooNotice:  Undefined variable: ref1
// echo $ref2."\n"; // >foo
// echo $var."\n"; // >Notice:  Undefined variable: var

// $var = "foo";
// $ref1 =& $var; // new object that references $var
// $ref2 =& $ref1; // references $var directly, not $ref1!!!!!
// echo $var."\n"; // >foo
// unset($ref1);
// echo $ref1."\n"; // >Notice:  Undefined variable: ref1
// echo $ref2."\n"; // >foo
// echo $var."\n"; // >foo



// Our closure
// $double = function($a) {
//     return $a * 2;
// };

// // This is our range of numbers
// $numbers = range(1, 5);

// // Use the closure as a callback here to 
// // double the size of each element in our 
// // range
// $new_numbers = array_map($double, $numbers);

// print implode(' ', $new_numbers);

// $deleteUselessKeys = function($a){
//     error_log(json_encode($a));
//     return $a;
// };

// $res = array(
//     array(
//         'a'=>1,
//         'b'=>2,
//     ),
//     array(
//         'a'=>3,
//         'b'=>4,
//     ),
//     array(
//         'a'=>5,
//         'b'=>6,
//     )
// );
// $result = array_map($deleteUselessKeys,$res);
// error_log(json_encode($result));


// $foo = 1 + "10 Small Pigs";
// print $foo; // 11



// $foo2 = 1.5 + "aa 10.6 Small Pigs";
// print $foo2; // 1.5

//Example #6 静态变量与递归函数
//静态变量也提供了一种处理递归函数的方法。递归函数是一种调用自己的函数。写递归函数时要小心，因为可能会无穷递归下去。必须确保有充分的方法来中止递归。以下这个简单的函数递归计数到 10，使用静态变量 $count 来判断何时停止：
//
// function test()
// {
//     static $count = 0;

//     $count++;
//     echo "a:".$count;
//     if ($count < 10) {
//         test();
//     }
//     $count--;
//     echo "b:".$count;
// }

// test();

// function foo(){
//     static $int = 0;          // correct
//     static $int = 1+2;        // wrong  (as it is an expression)
//     // static $int = sqrt(121);  // wrong  (as it is an expression too)

//     $int++;
//     echo $int;
// }
// foo();



// class foo {
//     var $bar = 'I am bar.';
//     var $arr = array('I am A.', 'I am B.', 'I am C.');
//     var $r   = 'I am r.';
// }

// $foo = new foo();
// $bar = 'bar';
// $baz = array('foo', 'bar', 'baz', 'quux');
// echo $foo->$bar . "\n";
// echo $foo->$baz[1] . "\n"; // I am bar.

// $start = 'b';
// $end   = 'ar';
// echo $foo->{$start . $end} . "\n";

// $arr = 'arr';
// echo $foo->$arr[1] . "\n";
// echo $foo->{$arr}[1] . "\n";    


// list 函数只会遍历索引为数字，且索引从0开始的数组，如下的数组$a就是不可以用list来访问。

// $a = array(
//     array("name"=>"wangfei2",
//         "age"=>10
//     ),
//     array("name"=>"wangfei2",
//         "age"=>20
//     ),
//     array("name"=>"wangfei3",
//         "age"=>30
//     ),
// );

// foreach ($a as list($name,$age)) {
//     echo "name:${name},age:${age}";
//     # code...
// }


class MyDestructableClass {
   function __construct() {
       print "In constructor\n";
       $this->name = "MyDestructableClass";
   }

   function show(){
     echo "show";
   }
   function __destruct() {
       print "Destroying " . $this->name . "\n";
   }
}

$obj = new MyDestructableClass();
$obj->show();

// In constructor
// show
// Destroying MyDestructableClass
?>


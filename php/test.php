<?php
// phpinfo();
// ʵ��
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

// ʵ����
// $array = array(
//     1    => "a",
//     "1"  => "b",
//     2.8  => "c",
//     true => "d",
// );
// var_dump($array);


// ʵ����
// ����һ���򵥵�����
// $array = array(1, 2, 3, 4, 5);
// print_r($array);// ����ɾ�����е�����Ԫ�أ����������鱾����:
// foreach ($array as $i => $value) {
//     unset($array[$i]);
// }
// print_r($array);// ���һ����Ԫ��ע���µļ����� 5���������������Ϊ�� 0��
// $array[] = 6;
// print_r($array);
// // ����������
// $array = array_values($array);
// $array[] = 7;
// print_r($array);



// ʵ����
// Note:

// unset() ��������ɾ�������е�ĳ��������Ҫע�����齫�����ؽ������������Ҫɾ�����ؽ������������� array_values() ������


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

// ʵ����
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
// ʵ����
// ת��Ϊ����
// class A {
//     private $A; // This will become '\0A\0A'
// }

// class B extends A {
//     private $A; // This will become '\0B\0A'
//     public $AA; // This will become 'AA'
// }

// var_dump((array) new B());


// ʵ����,��ѭ���иı䵥Ԫ,���ô���.
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
// ʵ����,fill an array with all items from a directory
// $handle = opendir('.');
// while (false !== ($file = readdir($handle))) {
//     $files[] = $file;
// }
// closedir($handle); 
// var_dump($files);
// 
// 
// 
// ʵ���ţ����ʽ��Ϊ�����keyҲ�ǿ��Ե�
// $k = "abc";
//  $a = array(
//     1     =>0,
//     1+1   =>1,
//     $k    =>2,
//     $k.'4'=>3,
//   );

//  var_dump($a);

// ʵ��ʮ�����ʽ��Ϊ�����keyҲ�ǿ��Ե�
// $a  = array(1 => 'a', 'b', 'd');
// print_r($a);
// array_splice($a,2,0,'c');
// var_dump($a);

// ����ֵ
// echo true != "false"?"1":"2"; //2

// echo false ; //ʲôҲû��
// echo (false) ;//ʲôҲû��
// echo false+false ;//0
// echo (false+false) ;//0
// echo intval(false) ;//0
// echo '"'.false.'"' ;// ""

// echo true ; //1
// echo (true) ;//1
// echo true+true ; //2
// echo (true+true) ;//ʲôҲû��
// echo intval(true) ;//1
// echo '"'.true.'"' ;// "1"
// 32 λϵͳ�µ��������
// $large_number = 2147483647;
// var_dump($large_number);                     // int(2147483647)

// $large_number = 2147483648;
// var_dump($large_number);                     // float(2147483648)

// $million = 1000000;
// $large_number =  50000 * $million;
// var_dump($large_number);                     // float(50000000000)

// Example #3 64 λϵͳ�µ��������
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


// Example #6 Nowdoc �ṹ�ַ���ʾ��
// $str = <<<'EOD'
// Example of string
// spanning multiple lines
// using nowdoc syntax.
// EOD;

/* ���б����ĸ����ӵ�ʾ�� */
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
 * Nowdoc �ṹ
 * ���� heredoc �ṹ������˫�����ַ�����Nowdoc �ṹ�������ڵ������ַ����ġ�
 * Nowdoc �ṹ���� heredoc �ṹ������ nowdoc �в����н���������
 * ���ֽṹ���ʺ�����Ƕ�� PHP �������������ı�����������е������ַ�����ת��
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
 * Heredoc �ṹ������û��ʹ��˫���ŵ�˫�����ַ����������˵�� heredoc 
 * �ṹ�е����Ų��ñ�ת�壬�����������г���ת�����л�����ʹ�á�
 * ���������滻������ heredoc �ṹ�к��и��ӵı���ʱҪ����С�ġ�
 * Heredoc �ṹ���ں������������������ݣ�
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
 * ���ַ�����˫���Ż� heredoc �ṹ����ʱ�����еı������ᱻ������
 * ���ﹲ�������﷨����һ�ּ򵥹���һ�ָ��ӹ���
 * �򵥵��﷨��������ú����ģ������������ٵĴ�����һ�� string ��Ƕ��һ��������
 * һ�� array ��ֵ����һ�� object �����ԡ�
 * ���ӹ����﷨������������û����Ű�Χ�ı��ʽ��
 * ���﷨
 * �� PHP ����������һ����Ԫ���ţ�$��ʱ������������ܶ������һ����ȥ��Ͼ�����ı�ʶ���γ�һ���Ϸ��ı������������û���������ȷ�������Ľ��ߡ�
 */

// $juice = "apple";

// echo "He drank some $juice juice.".PHP_EOL; //He drank some apple juice.
// echo "He drank some juice made of $juices.";//He drank some juice made of .
// // Invalid. "s" is a valid character for a variable name, but the variable is $juice.

// $name = "wangfei";
// echo "This is the value of the var named $name: {${$name}}"; //�����{${$name}}������ȷ����

#�������ַ������ô��﷨ͨ������������������ԡ�
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

//ʹ�� (unset) $var ��һ������ת��Ϊ null ������ɾ���ñ����� unset ��ֵ�����Ƿ��� NULL ֵ���ѡ�
// $unset_null_var = "10";
// // print $unset_null_var."\n"; //10
// $test = (unset)$unset_null_var;
// print $test; //ʲôҲ�����
// print $unset_null_var."\n"; //$unset_null_var ��ֵ����10
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

//Example #6 ��̬������ݹ麯��
//��̬����Ҳ�ṩ��һ�ִ���ݹ麯���ķ������ݹ麯����һ�ֵ����Լ��ĺ�����д�ݹ麯��ʱҪС�ģ���Ϊ���ܻ�����ݹ���ȥ������ȷ���г�ֵķ�������ֹ�ݹ顣��������򵥵ĺ����ݹ������ 10��ʹ�þ�̬���� $count ���жϺ�ʱֹͣ��
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


// list ����ֻ���������Ϊ���֣���������0��ʼ�����飬���µ�����$a���ǲ�������list�����ʡ�

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


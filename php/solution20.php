<?php
///20. 有效的括号
//给定一个只包括 '('，')'，'{'，'}'，'['，']' 的字符串，判断字符串是否有效。
//
//有效字符串需满足：
//
//左括号必须用相同类型的右括号闭合。
//左括号必须以正确的顺序闭合。
//注意空字符串可被认为是有效字符串。
//
//示例 1:
//
//输入: "()"
//输出: true
//示例 2:
//
//输入: "()[]{}"
//输出: true
//示例 3:
//
//输入: "(]"
//输出: false
//示例 4:
//
//输入: "([)]"
//输出: false
//示例 5:
//
//输入: "{[]}"
//输出: true
//解题思路
//利用栈。
//遇到左括号，一律推入栈中，
//遇到右括号，将栈顶部元素拿出，如果不匹配则返回 false，如果匹配则继续循环。
//
//为了提高性能, 在循环前进行这一步：let len = s.length是非常关键的，减少了计算次数。
//为了提高执行时间，这一步if (len%2) return false是非常关键的，减少了不必要的计算。
//
//作者：ldwx-DvRFo6yGja
//链接：https://leetcode-cn.com/problems/valid-parentheses/solution/ying-gai-shi-quan-wang-zui-you-jie-liao-by-ldwx-dv/
//来源：力扣（LeetCode）
//著作权归作者所有。商业转载请联系作者获得授权，非商业转载请注明出处。
///


/**
 * Class solution20
 */
class solution20
{
    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s = "")
    {
        if(strlen($s) == 0){
            return true;
        }
        $s = str_split($s,1);
        $count = count($s);
        if ($count % 2 != 0) {
            return false;
        }

        $dict = ['(' => ')', '[' => ']', '{' => '}'];
        $dictFlip = array_flip($dict);
        $keys = array_keys($dict);
        $values = array_values($dict);

        $stack = Array();
        foreach ($s as $item) {
            if (in_array($item, $keys)) {
                array_push($stack, $item);
            } elseif (in_array($item, $values)) {
                if (count($stack) < 1) {
                    return false;
                } elseif (array_pop($stack) != $dictFlip[$item]) {
                    return false;
                } else {
                    continue;
                }
            }
        }
        if (!empty($stack)) {
            return false;
        }
        return true;
    }


}

$api = new solution20();
var_dump($api->isValid(""));
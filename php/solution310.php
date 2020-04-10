<?php

/**
 * 310. 最小高度树
对于一个具有树特征的无向图，我们可选择任何一个节点作为根。图因此可以成为树，在所有可能的树中，具有最小高度的树被称为最小高度树。给出这样的一个图，写出一个函数找到所有的最小高度树并返回他们的根节点。

格式

该图包含 n 个节点，标记为 0 到 n - 1。给定数字 n 和一个无向边 edges 列表（每一个边都是一对标签）。

你可以假设没有重复的边会出现在 edges 中。由于所有的边都是无向边， [0, 1]和 [1, 0] 是相同的，因此不会同时出现在 edges 里。

示例 1:

输入: n = 4, edges = [[1, 0], [1, 2], [1, 3]]

0
|
1
/ \
2   3

输出: [1]
示例 2:

输入: n = 6, edges = [[0, 3], [1, 3], [2, 3], [4, 3], [5, 4]]

0  1  2
\ | /
3
|
4
|
5

输出: [3, 4]
说明:

根据树的定义，树是一个无向图，其中任何两个顶点只通过一条路径连接。 换句话说，一个任何没有简单环路的连通图都是一棵树。
树的高度是指根节点和叶子节点之间最长向下路径上边的数量。
 * Class solution
 */
class solution310
{

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer[]
     */
    function findMinHeightTrees($n, $edges) {
        $result = [];
//      1.条件判断（边界判断，其他要求的判断）
        if($n == 1){
            return [0];
        }
        elseif($n == 2){
            return [0,1];
        }
        $degree = [];//用于存储每个节点的度数
        $map = [];//用于存储每个节点直接相连的节点
        foreach($edges as $edge){
            $degree[$edge[0]]++; //计算edge[0]节点的度数
            $degree[$edge[1]]++;//计算edge[1]节点的度数
            $map[$edge[0]][] = $edge[1];//跟edge[0]相邻的节点
            $map[$edge[1]][] = $edge[0];//跟edge[1]相邻的节点
        }

        asort($degree);
//      2.创建队列
        $queue = [];
//      3.在队列中加入度数最小的节点（第一个满足条件的元素）
        foreach($degree as $key=>$item){
            if($item == 1){
                $queue[] = $key;
            }
        }
//      4.while(队列不为空) {
//            取出队列头部元素
//            操作
//            根据头部元素，往队列中再次加入满足条件的元素
//        }

        while(count($queue)>0){
            $result = [];
            $size = count($queue);
            for($i=0;$i<$size;$i++){
                $node = array_shift($queue);
                $result[] = $node;
                $nextNodes = $map[$node];
                foreach ($nextNodes as $item){
                    $degree[$item]--;
                    if($degree[$item] == 1){
                        $queue[] = $item;
                    }
                }
            }
        }

        return $result;

    }

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer[]
     */
    function findMinHeightTrees2($n, $edges) {
        //寻找叶节点，逐层删除
        if(count($edges)==0) return [0];
        $inDegree = array_fill(0,$n,0);
        $adj = [];
        foreach($edges as $edge){
            $adj[$edge[0]][] = $edge[1];
            $adj[$edge[1]][] = $edge[0];
            $inDegree[$edge[0]]++;
            $inDegree[$edge[1]]++;
        }
        $queue = [];
        for($i=0;$i<$n;$i++){
            if($inDegree[$i] == 1) $queue[] = $i;
        }
        while($n>2){
            $qlen = count($queue);
            $n -= $qlen;
            for($i=0;$i<$qlen;$i++){
                $top = array_shift($queue);
                $inDegree[$top]--;
                foreach($adj[$top] as $nb){
                    $inDegree[$nb]--;
                    if($inDegree[$nb] == 1)$queue[] = $nb;
                }
            }
        }
        return $queue;
    }


}

/**
 *
 * BFS + DFS
powcai
发布于 6 个月前
1.9k
思路:
思路一：bfs


class Solution:
def findMinHeightTrees(self, n: int, edges: List[List[int]]) -> List[int]:
from collections import defaultdict
if not edges:
return [0]
graph = defaultdict(list)
for x, y in edges:
graph[x].append(y)
graph[y].append(x)
# 叶子节点
leaves = [i for i in graph if len(graph[i]) == 1]
while n > 2:
n -= len(leaves)
nxt_leaves = []
for leave in leaves:
# 与叶子节点相连的点找到
tmp = graph[leave].pop()
# 相连的点删去这个叶子节点
graph[tmp].remove(leave)
if len(graph[tmp]) == 1:
nxt_leaves.append(tmp)
leaves = nxt_leaves
return list(leaves)
思路二：dfs（超时）

把每个节点最高高度找出来

class Solution:
def findMinHeightTrees(self, n: int, edges: List[List[int]]) -> List[int]:
from collections import defaultdict
if not edges: return [0]
graph = defaultdict(list)
# 记录每个节点最高的高度
lookup = [0] * n
for x, y in edges:
graph[x].append(y)
graph[y].append(x)

# print(graph)
def dfs(i, visited, depth):
lookup[i] = max(lookup[i], depth)
for j in graph[i]:
if j not in visited:
dfs(j, visited | {j}, depth + 1)

leaves = [i for i in graph if len(graph[i]) == 1]
for i in leaves:
dfs(i, {i}, 1)
min_num = min(lookup)
return [i for i in range(n) if lookup[i] == min_num]
 */
<?php
function bfs_Traversal($graph_Traversal, $start) 
{
    $visited = array();
    $queue = array();

    $visited[$start] = true;
    array_push($queue, $start);

    while (!empty($queue))
     {
        $node = array_shift($queue);
        echo $node . " ";

        foreach ($graph_Traversal[$node] as $neighbor) 
        {
            if (!isset($visited[$neighbor])) 
            {
                $visited[$neighbor] = true;
                array_push($queue, $neighbor);
            }
        }
    }
}

$graph_Traversal = array
(
    'A' => array('B', 'C', 'E'),
    'B' => array('A', 'C'),
    'C' => array('A', 'B' , 'D' ,'E'),
    'D' => array('C' , 'E'),
    'E' => array('D', 'C'),

);

$startNode = 'A';

echo "BFS traversal Start To END " . $startNode . ": ";
bfs_Traversal($graph_Traversal, $startNode);
?>
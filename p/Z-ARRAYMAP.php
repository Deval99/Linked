<?php
echo "Hello";

$a = array(1, 2, 3, 4, 5);
$b = array_map("cube", $a);
print_r($b);

function cube($n)
{
    return($n * $n * $n);
}

?>
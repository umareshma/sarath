<html>
<body>

<?php
function  even($a)
{
    
    return !($a & 1);
}
function odd($a)
{
    
    return $a & 1;
}

$array2 = [6, 7, 8, 9, 10, 11, 12];

echo "Even:\n";
print_r(array_filter($array2, "even"));

echo "Odd :\n";
print_r(array_filter($array2, "odd"));
?>
</body>
</html>
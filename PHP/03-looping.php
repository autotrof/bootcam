<?php

for ($i = 0; $i <= 5; $i++) {
    echo $i;
}
// HASIL: 012345

$x = 0;
while ($x < 10) {
    echo $x;
    $x++;
}
// HASIL: 0123456789

$variabelArray = [
    1, 3, 5, 7
];
foreach ($variabelArray as $key => $value) {
    echo "Key " . $key . " = " . $value . "\n";
}
// HASIL: 
// Key 0 = 1
// Key 1 = 3
// Key 2 = 5
// Key 3 = 7

?>
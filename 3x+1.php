<?php

$number = $_GET['num'];   // Example: 3x+1.php?num=15

echo "Starting Number: " . $number . "<br>";

while ($number != 1) {

    if ($number % 2 == 0) {
        $number /= 2;
    } else {
        $number = 3 * $number + 1;
    }

    echo $number."<br>";
}
?>
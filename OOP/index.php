<?php

require "collatz.php";

$start = $_GET['start'];
$end = $_GET['end'];

$collatz = new Collatznum($start);

$collatz->calculateInterval($start, $end);

$stats = $collatz->statistics();

echo "Interval: $start - $end <br><br>";
echo "Number with MAX iterations: " . $stats["maxIterationsNumber"] . "<br>";
echo "Number with MIN iterations: " . $stats["minIterationsNumber"] . "<br>";
echo "Number with MAX reached value: " . $stats["maxValueNumber"] . "<br>";
echo "Updated from feature branch"."<br>";

?>

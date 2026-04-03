<?php

class Collatznum {

    private $startNum;
    private $results = [];

    //making a constructor to set starting number
    public function __construct($startNum) {
        $this->startNum = $startNum;
    }

    // method to calculate collatz sequence for one number
    private function calculateSequence($number) {

        $iterations = 0;
        $maxValue = $number;

        while ($number != 1) {

            if ($number % 2 == 0) {
                $number = $number / 2;
            } else {
                $number = 3 * $number + 1;
            }

            $iterations++;

            if ($number > $maxValue) {
                $maxValue = $number;
            }
        }

        return [
            "iterations" => $iterations,
            "maxValue" => $maxValue
        ];
    }

    // method to perform calculations for an interval
    public function calculateInterval($start, $end) {

        for ($i = $start; $i <= $end; $i++) {

            $data = $this->calculateSequence($i);

            $this->results[$i] = [
                "iterations" => $data["iterations"],
                "maxValue" => $data["maxValue"]
            ];
        }
    }

    // Method to calculate statistics min, mx and max value
    public function statistics() {

        $maxIterations = PHP_INT_MIN;
        $minIterations = PHP_INT_MAX;
        $maxReachedValue = PHP_INT_MIN;

        $numberMaxIter = 0;
        $numberMinIter = 0;
        $numberMaxValue = 0;

        foreach ($this->results as $number1 => $data) {

            if ($data["iterations"] > $maxIterations) {
                $maxIterations = $data["iterations"];
                $numberMaxIter = $number1;
            }

            if ($data["iterations"] < $minIterations) {
                $minIterations = $data["iterations"];
                $numberMinIter = $number1;
            }

            if ($data["maxValue"] > $maxReachedValue) {
                $maxReachedValue = $data["maxValue"];
                $numberMaxValue = $number1;
            }
        }

        return [
            "maxIterationsNumber" => $numberMaxIter,
            "maxIterations" => $maxIterations,

            "minIterationsNumber" => $numberMinIter,
            "minIterations" => $minIterations,

            "maxValueNumber" => $numberMaxValue,
            "maxValue" => $maxReachedValue
        ];
    }
}
?>
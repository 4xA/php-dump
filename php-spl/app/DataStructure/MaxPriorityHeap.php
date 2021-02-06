<?php

namespace App\DataStructure;

use SplHeap;

class MaxPriorityHeap extends SplHeap
{
    /**
     * comparator in MaxHeap datastructure
     * 
     * @param $value1 first value to compare
     * @param $value2 second value to comare
     * 
     * @return int
     */
    public function compare($value1, $value2): int
    {
        $priority1 = $value1->getPriority();
        $priority2 = $value2->getPriority();

        if ($priority1 === $priority2) {
            return 0;
        }

        return $priority1 > $priority2 ? 1 : -1;
    }
}

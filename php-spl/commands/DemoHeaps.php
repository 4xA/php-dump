<?php

namespace Commands;

use App\AbstractCommand;
use App\DataStructure\MaxPriorityHeap;
use App\PriorityVector;

/**
 * Heaps are a good datastructure for when you need to access the max/min value
 * of a set of values with a quick insertion time. Example uses: queues,
 * schedulars.
 */
class DemoHeaps extends AbstractCommand
{
    public function execute()
    {
        $heap = new MaxPriorityHeap();

        $heap->insert(new PriorityVector(5, 'delete'));
        $heap->insert(new PriorityVector(2, 'copy'));
        $heap->insert(new PriorityVector(10, 'insert'));
        $heap->insert(new PriorityVector(7, 'update'));
        $heap->insert(new PriorityVector(5, 'delete'));

        foreach ($heap as $priorityVector) {
            echo <<<EOT
                Job: {$priorityVector->getValue()}
                Priority: {$priorityVector->getPriority()}
                \n
                EOT;
        }
    }
}

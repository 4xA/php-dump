<?php

namespace App\User;

/**
 * a normal user
 */
class PeasantUser extends User {
    /**
     * print a pretty message
     * @return null
     */
    public function print()
    {
        echo 'hello' . PHP_EOL;
        return null;
    }

    private function find()
    {
        return 'found';
    }
}

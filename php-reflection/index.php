<?php

use App\User\PeasantUser;

require __DIR__ . '/vendor/autoload.php';

$reflectionClass = new ReflectionClass(PeasantUser::class);

print_r($reflectionClass->getName() . PHP_EOL);
echo PHP_EOL . "----------------" . PHP_EOL;
print_r(($reflectionClass->getDocComment() ?: 'doc comment does not exist') . PHP_EOL);
echo PHP_EOL . "----------------" . PHP_EOL;
print_r($reflectionClass->getParentClass() . PHP_EOL);
echo PHP_EOL . "----------------" . PHP_EOL;
print_r(($reflectionClass->isInstance(new PeasantUser()) ?: 'is not instance') . PHP_EOL);
echo PHP_EOL . "----------------" . PHP_EOL;

$reflectionMethod = new ReflectionMethod(PeasantUser::class, 'print');

print_r($reflectionMethod->getDocComment() . PHP_EOL);

$reflectionMethodFind = new ReflectionMethod(PeasantUser::class, 'find');
if ($reflectionMethodFind->isPrivate()) {
    $reflectionMethodFind->setAccessible(true);
}
echo $reflectionMethodFind->invoke(new PeasantUser()) . PHP_EOL;

<?php

use Nfq\Academy\Homework\ClassA;
use Nfq\Academy\Homework\Subpackage\ClassB;
use Nfq\Academy\Homework\Subpackage\ClassC as student;

require_once __DIR__.'/bootstrap.php';

$a = new ClassA();
$a->doSomething();

$b = new ClassB();
$b->doSomething();

$c = new student();
$c->getName("Viktoras Rimkus");



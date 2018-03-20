<?php

use Nfq\Academy\Homework\ClassA;
use Nfq\Academy\Homework\Subpackage\ClassB;
use Nfq\Academy\Homework\Subpackage\ClassC as student;
use Symphony\Module\ClassD;

require_once __DIR__ . '/bootstrap.php';


$a = new ClassA();
$a->doSomething();

$b = new ClassB();
$b->doSomething();

$d = new ClassD();
$d->doSomething();

$c = new student();
$c->getName("Viktoras Rimkus");



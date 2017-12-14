<?php

namespace AppTest\Acme;

require __DIR__ . "/bootstrap.php";

use App\Acme\Foo;

$foo = new Foo();
echo $foo->getName();


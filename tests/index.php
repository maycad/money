<?php

require_once __DIR__ . '/../vendor/autoload.php';

use MayCad\Money\Money;

$money = new Money(['key' => 'richard', 'secret' => '123456']);

$money->deposit([]);

$money->transfer([]);

$money->withdrawal([]);
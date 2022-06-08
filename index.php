<?php
require_once 'vendor/autoload.php';
use taskforce\logic\AvailableActions;
$obj = new AvailableActions('new', 1, 5);
print_r($obj);
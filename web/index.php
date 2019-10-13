<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('log_errors', __DIR__.'/../php.errors');

require_once __DIR__.'/../vendor/autoload.php';

Dof\Framework\Web\Kernel::handle(dirname(__DIR__));

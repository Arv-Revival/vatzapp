<?php
require($_SERVER["DOCUMENT_ROOT"] . "/../vendor/autoload.php");

$openapi = \OpenApi\Generator::scan([$_SERVER["DOCUMENT_ROOT"] . '/../app/Http/']);

header('Content-Type: application/json');
echo $openapi->toJSON();

<?php
require_once 'vendor/autoload.php';

use Src\CountPriceDelivery;

$sourceKladr = 'Aveny str. 1';
$targetKladr = 'Aveny str. 11';
$weight = 1.0;

$countService = new CountPriceDelivery($sourceKladr, $targetKladr, $weight);
$countService->call();

<?php

namespace src;

use src\Delivery\DefaultDelivery;
use src\Delivery\FastDelivery;

class CountPriceDelivery
{
  public function __construct(public string $sourceKladr, public string $targetKladr, public float $weight)
  {}

  public function call(): array
  {
    return [
        'default-delivery' => (new DefaultDelivery($this->sourceKladr, $this->targetKladr, $this->weight))->reposonse(),
        'fast-delivery' => (new FastDelivery($this->sourceKladr, $this->targetKladr, $this->weight))->reposonse()
    ];
  }
}
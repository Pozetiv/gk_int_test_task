<?php
namespace Src\Delivery;

class DefaultDelivery extends BaseDelivery
{
  const BASE_PRICE = 150.0;

  protected function price_response($data): float
  {
    return self::BASE_PRICE * $data['coefficient'];
  }

   public function baseUrl(): string {
      return 'Delivery.url';
  }
}
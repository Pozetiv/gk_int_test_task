<?php
namespace Src\Delivery;

use Symfony\Component\HttpClient\HttpClient;

class BaseDelivery implements DeliveryInterface
{
  public function __construct(public string $sourceKladr, public string $targetKladr, public float $weight)
  {}

  public function reposonse(): ?array
  {
    $data = $this->requestToApi();

    return [
      'price' => $this->price_response($data),
      'date' => $this->date_response($data),
      'error' => $this->error_response($data)
    ];
  }


  private function requestToApi(): array
  {
    $requestData = [
      'sourceKladr' => $this->sourceKladr,
      'targetKladr' => $this->targetKladr,
      'weight' => $this->weight
    ];
    $client = HttpClient::create();

    return $client->request('POST', $this->baseUrl(), $requestData)->toArray();
  }

  protected function error_response($data): string
  {
    return $$data['error'];
  }

  protected function price_response($data): float
  {
    return $data['price'];
  }
  

  protected function date_response($data): string
  {
    return $data['date'];
  }

    public function baseUrl(): string {
      return 'url_delivery_company_api';
    }
}
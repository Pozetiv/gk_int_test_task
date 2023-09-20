<?php
namespace Src\Delivery;

class FastDelivery extends BaseDelivery
{
//  после 18.00 заявки не принимаются.
  public function reposonse(): ?array
  {
      if(intval(date("H")) >= 18) return null;

      return parent::reposonse();
  }


  protected function date_response($data): string
  {
    return date("Y-m-d", strtotime("+{$data['period']} days"));
  }

  public function baseUrl(): string {
      return 'FastDelivery.url';
  }
}
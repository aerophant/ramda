<?php
namespace Aerophant\RamdaTest\Asset;

class PlainObjectAsset
{
  private $data;

  /**
   * @return mixed
   */
  public function getData()
  {
    return $this->data;
  }

  /**
   * @param mixed $data
   */
  public function setData($data): void
  {
    $this->data = $data;
  }
}

<?php

namespace App\Traits;

use Illuminate\Mail\Transport\Transport;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

trait Shipment
{
   public function baseFeePrice($transport="air") : int
   {
       return Config('freight.transport.'.$transport.'.base_fee');
   }

   public function perKgPrice($transport="air") : int
   {
       return Config('freight.transport.'.$transport.'.per_kg');
   }

   public function flatRateByCountry($country = 'us') : int
   {
       return Config('freight.country.'.$country.'.flat_rate');
   }

   public function taxPercentage() : float
   {
       return Config('freight.tax');
   }

   public function priceForTotalKg($weight, $transport) : int
   {
       return $this->perKgPrice($transport) * $weight;
   }

   public function  calcShipmentCost($country, $transport, $weight) 
   {
       $value= $this->baseFeePrice($transport) + $this->priceForTotalKg($weight, $transport) + $this->flatRateByCountry($country);
       return $value;
   }

   public function  calcTotaltCost(array $data) : array
   {
       $order_cost = $this->calcShipmentCost($data['country'], $data['transport'], $data['weight']);
       $tax = $order_cost * $this->taxPercentage();
       $total_cost = $tax + $order_cost;

       return [
           "tax" => $tax,
           "total_cost" => $total_cost,
           "country" => $data['country'],
           "transport" => $data['transport'],
           "weight" => $data['weight'],
           "name" => $data['name']
       ];
   }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Stripe\Product;
use Stripe\Price as StripePrice;

class Price extends Model
{
    public static function getAll()
    {
        $retPrices = [];
        foreach (StripePrice::all() as $price) {
            $product = Product::retrieve($price->product);

            $price->productName = $product->name;

            $retPrices[] = $price;
        }

        return $retPrices;
    }
}

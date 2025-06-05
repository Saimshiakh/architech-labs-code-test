# architech-labs-code-test

# Acme Widget Co - Shopping Basket POC

This is a PHP proof-of-concept basket system for Acme Widget Co.

## Features

- Supports product catalog, delivery rules, and promotional offers
- Dynamic calculation of total including discounts and delivery
- Easily extendable

## How to Use

1. Clone the repo
2. Include `Basket.php` in your project
3. Initialize it with a product list, delivery rules, and offers
4. Use `add()` to add items, and `total()` to get final price

## Example

```php
$basket = new Basket($products, $deliveryRules, $offers);
$basket->add('R01');
$basket->add('R01');
echo $basket->total(); // $54.37

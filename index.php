# Example Usage: created index.php File:


require_once 'Basket.php';

$catalog = [
    'R01' => 32.95,
    'G01' => 24.95,
    'B01' => 7.95
];

$deliveryRules = [
    50 => 4.95,
    90 => 2.95,
    PHP_INT_MAX => 0.00 // Free delivery over $90
];

$offers = [
    'R01' => 'BOGO_HALF' // Buy one get one half
];

$basket = new Basket($catalog, $deliveryRules, $offers);
$basket->add('B01');
$basket->add('B01');
$basket->add('R01');
$basket->add('R01');
$basket->add('R01');

echo "Total: $" . $basket->total(); // Expected: 98.27

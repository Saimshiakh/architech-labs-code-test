# Solution Structure
# Basket.php
class Basket
{
    private $products;
    private $deliveryRules;
    private $offers;
    private $items = [];

    public function __construct($products, $deliveryRules, $offers = [])
    {
        $this->products = $products;
        $this->deliveryRules = $deliveryRules;
        $this->offers = $offers;
    }

    public function add($productCode)
    {
        if (!isset($this->products[$productCode])) {
            throw new Exception("Product code {$productCode} not found.");
        }

        if (!isset($this->items[$productCode])) {
            $this->items[$productCode] = 0;
        }

        $this->items[$productCode]++;
    }

    public function total()
    {
        $subtotal = 0;

        foreach ($this->items as $code => $qty) {
            $price = $this->products[$code];
            if ($code === 'R01' && isset($this->offers['R01'])) {
                $offerQty = floor($qty / 2);
                $fullQty = $qty - $offerQty;
                $subtotal += ($fullQty * $price) + ($offerQty * ($price / 2));
            } else {
                $subtotal += $qty * $price;
            }
        }

        // Apply delivery
        $delivery = 0;
        foreach ($this->deliveryRules as $limit => $cost) {
            if ($subtotal < $limit) {
                $delivery = $cost;
                break;
            }
        }

        return number_format($subtotal + $delivery, 2);
    }
}

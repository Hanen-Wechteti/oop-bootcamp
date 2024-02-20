<?php

// Consider the same basket as in use case 1. The shop owner wants to have a way to have 50% off every fruit.
//  Can you find a way to implement the discount once, and re-use it efficiently for every fruit?

require_once "usecase1.php";

class basketwithDiscount extends course {

    public function applyDiscount() {

        $discountFactor = 0.5; //50% dicscount

        $this-> banana *= (1 - $discountFactor);
        $this-> apple *= (1 - $discountFactor);
    } 
    
}
$basketwithDiscount = new basketwithDiscount (6, 3, 2);

$basketwithDiscount->applyDiscount();

// calculate price and tax with discount 50%

$pricewithDiscount = $basketwithDiscount->price();
$taxwithDiscount = $basketwithDiscount->tax();

echo "price with 50% discount: £" . number_format($pricewithDiscount, 2) . "<br>";
echo "tax with 50% discount: £" .number_format($taxwithDiscount, 2) ."<br>";


?>
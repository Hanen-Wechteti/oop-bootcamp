<?php

// A basket contains the following things:

// Banana's (6 pieces, costing €1 each)
// Apples (3 pieces, costing €1.5 each)
// Bottles of wine (2 bottles, costing €10 each)
// Without using classes, do the following in your code:

// Calculate the total price
// Calculate how much of the total price is tax (fruit goes at 6%, wine is 21%)

//using without classes

$total_price = (6*1)+(3*1.5)+(2*10);
echo $total_price . "<br>";

$tax_fruit = (((6*1) + (3*1.5))/100*6) + ((2*10)/100*21);
echo $tax_fruit ;

//using classes

class course {
    const banana = 1;
    const apple = 1.5;
    const wine = 10;
    const tax_fruit = 0.06;
    const tax_wine = 0.21;

            public function __construct ($numbanana, $numapple, $numwine)
            {
                $this->banana = self::banana *$numbanana;
                $this->apple = self::apple *$numapple;
                $this->wine = self::wine *$numwine;
            }

            public function price()
            {
                $total_price = $this->banana + $this->apple + $this->wine;
                return $total_price;
            }

            public function tax()
            {
                $taxfruit =  ($this->banana + $this->apple) * self::tax_fruit ;
                $taxwine = ($this-> wine) * self:: tax_wine;
                return $taxfruit +$taxwine;
            }
}

$basket1 = new course (6,3,2);
echo $basket1->price(). "<br>";
echo $basket1->tax(). "<br>";
?>
<?php
namespace app;
class Cart{
    public $products = null;
    public $totalPrice = 0;
    public $totalQuantity = 0;
    public function constant($cart) {
        if ($cart) {
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuantity = $cart->totalQuantity;
        }
    }
};

?>
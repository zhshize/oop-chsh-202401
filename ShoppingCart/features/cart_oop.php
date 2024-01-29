<?php

class Cart {

    /**
     * 購物車的名稱
     */
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;

        if (session_status() !== PHP_SESSION_DISABLED && !isset($_SESSION['shopping_carts'])) {
            $_SESSION['shopping_carts'] = [];
        }

        if (!isset($_SESSION['shopping_carts'][$this->name])) {
            $_SESSION['shopping_carts'][$this->name] = [];
        }
    }

    public static function getAllCarts(): array {
        return $_SESSION['shopping_carts'];
    }

    public function getCart(): array {
        return $_SESSION['shopping_carts'][$this->name];
    }

    public function addToCart(array $item, int $amount): void {
        foreach ($this->getCart() as $key => $value) {
            if ($value['item'] === $item) {
                $_SESSION['shopping_carts'][$this->name][$key]['amount'] += $amount;
                return;
            }
        }

        $_SESSION['shopping_carts'][$this->name][] = ['item' => $item, 'amount' => $amount];
    }

    public function removeFromCart(array $item): void {
        foreach ($this->getCart() as $key => $value) {
            if ($value['item'] === $item) {
                unset($_SESSION['shopping_cart'][$key]);
                return;
            }
        }
    }

    public function totalPrice(): int {
        // TODO: calculate the total price of the cart
        return 0;
    }
}

<?php

class Cart
{
    /**
     * 購物車的名稱
     */
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;

        if (session_status() === PHP_SESSION_DISABLED) {
            session_start();
        }
        if (!isset($_SESSION['shopping_carts'])) {
            $_SESSION['shopping_carts'] = [];
        }
        if (!isset($_SESSION['shopping_carts'][$this->name])) {
            $_SESSION['shopping_carts'][$this->name] = [];
        }
    }

    public static function getAllCarts(): array
    {
        return $_SESSION['shopping_carts'];
    }

    public function getCart(): array
    {
        return $_SESSION['shopping_carts'][$this->name];
    }

    public function addToCart(array $item, int $amount): void
    {
        foreach ($this->getCart() as $key => $value) {
            if ($value['item'] === $item) {
                $_SESSION['shopping_carts'][$this->name][$key]['amount'] += $amount;
                return;
            }
        }

        $_SESSION['shopping_carts'][$this->name][] = ['item' => $item, 'amount' => $amount];
    }

    public function removeFromCart(array $item): void
    {
        foreach ($this->getCart() as $key => $value) {
            if ($value['item'] === $item) {
                unset($_SESSION['shopping_carts'][$this->name][$key]);
                return;
            }
        }
    }

    public function totalPrice(): int
    {
        // TODO: calculate the total price of the cart
        return 0;
    }

    public function showCart(): void
    {
        echo '<ul>';
        foreach ($_SESSION['shopping_carts'][$this->name] as ['item' => ['name' => $name, 'price' => $price], 'amount' => $amount]) {
            echo "<li>商品: $name, 單價: $price, 數量: $amount</li>";
        }
        echo '</ul>';
    }
}

$cart1 = new Cart('normal');
$cart1->addToCart(['name' => '貓抓板', 'price' => 199], 4);
$cart1->addToCart(['name' => '金磚', 'price' => 792300], 1);
$cart1->addToCart(['name' => '貓抓板', 'price' => 199], 1);
$cart1->removeFromCart(['name' => '金磚', 'price' => 792300]);

$cart1->showCart();


$cart2 = new Cart('golden');
$cart2->addToCart(['name' => '電暖爐', 'price' => 9990], 1);

$cart2->showCart();

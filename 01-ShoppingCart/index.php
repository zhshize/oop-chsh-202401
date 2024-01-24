<?php

function setupCart() {
    if (session_status() === PHP_SESSION_DISABLED) {
        session_start();
    }
    if (!isset($_SESSION['shopping_cart'])) {
        $_SESSION['shopping_cart'] = [];
    }
}

function getCart(): array {
    return $_SESSION['shopping_cart'];
}

function addToCart(array $item, int $amount): void {
    foreach ($_SESSION['shopping_cart'] as $key => $value) {
        if ($value['item'] === $item) {
            $_SESSION['shopping_cart'][$key]['amount'] += $amount;
            return;
        }
    }

    $_SESSION['shopping_cart'][] = ['item' => $item, 'amount' => $amount];
}

function removeFromCart(array $item): void {
    foreach ($_SESSION['shopping_cart'] as $key => $value) {
        if ($value['item'] === $item) {
            unset($_SESSION['shopping_cart'][$key]);
            return;
        }
    }
}

function totalPrice(): int {
    // TODO: calculate the total price of the cart
    return 0;
}

function showCart(): void {
    echo '<ul>';
    foreach ($_SESSION['shopping_cart'] as ['item' => ['name' => $name, 'price' => $price], 'amount' => $amount]) {
        echo "<li>商品: $name, 單價: $price, 數量: $amount</li>";
    }
    echo '</ul>';
}

setupCart();

addToCart(['name' => '貓抓板', 'price' => 199], 4);
addToCart(['name' => '電暖爐', 'price' => 9990], 1);
addToCart(['name' => '貓抓板', 'price' => 199], 1);

showCart();

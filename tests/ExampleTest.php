<?php

use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    protected $cart;

    protected function setUp(): void
    {
        // Емуляція кошика
        $this->cart = [];
    }

    public function testAddItemToCart()
    {
        // Додаємо товар до кошика
        $item = ['id' => 1, 'name' => 'Laptop', 'price' => 1500];
        $this->cart[] = $item;

        // Перевіряємо, чи товар додано
        $this->assertCount(1, $this->cart);
        $this->assertEquals('Laptop', $this->cart[0]['name']);
    }

    public function testCalculateTotalPrice()
    {
        // Додаємо товари до кошика
        $this->cart[] = ['id' => 1, 'name' => 'Laptop', 'price' => 1500];
        $this->cart[] = ['id' => 2, 'name' => 'Mouse', 'price' => 50];

        // Підрахунок загальної ціни
        $totalPrice = array_sum(array_column($this->cart, 'price'));

        // Перевірка загальної ціни
        $this->assertEquals(1550, $totalPrice);
    }

    public function testEmptyCart()
    {
        // Очищуємо кошик
        $this->cart = [];

        // Перевіряємо, чи кошик порожній
        $this->assertEmpty($this->cart);
    }
}

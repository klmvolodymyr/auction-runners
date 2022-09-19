<?php

namespace AuctionRunners\Model;

class BetModel 
{
    private int $price = 0;

    public function __construct(int $price)
    {
        $this->price = $price;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}
<?php

namespace AuctionRunners\Model;

class WinnerModel
{
    private int $price = 0;
    private BidModel $bid;
    private BuyerModel $buyer;

    public function __construct(int $price, BidModel $bid, BuyerModel $buyer)
    {
        $this->bid = $bid;
        $this->price = $price;
        $this->buyer = $buyer;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getBid(): BidModel
    {
        return $this->bid;
    }

    public function getBuyer(): BuyerModel
    {
        return $this->buyer;
    }
}

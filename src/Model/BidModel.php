<?php

namespace AuctionRunners\Model;

class BidModel
{
    private BetModel $bet;
    private BuyerModel $buyer;

    public function __construct(BetModel $bet, BuyerModel $buyer)
    {
        $this->bet = $bet;
        $this->buyer = $buyer;
    }

    public function getBet(): BetModel
    {
        return $this->bet;
    }

    public function getBuyer(): BuyerModel
    {
        return $this->buyer;
    }
}
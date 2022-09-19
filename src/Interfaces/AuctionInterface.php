<?php

namespace AuctionRunners\Interfaces;

use AuctionRunners\Model\BidModel;
use AuctionRunners\Model\WinnerModel;

interface AuctionInterface
{
    public function extractWinner(): ?WinnerModel;
    public function loadBid(BidModel $bid): void;
    public function isActive(): bool;
    public function close(): void;
}
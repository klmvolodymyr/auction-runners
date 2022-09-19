<?php

namespace AuctionRunners\Interfaces;

use AuctionRunners\Model\WinnerModel;

interface CarouselInterface
{
    public function start(): string;
    public function getWinner(string $auctionId): ?WinnerModel;
}

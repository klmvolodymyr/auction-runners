<?php

namespace AuctionRunners\Interfaces;

use AuctionRunners\Model\WinnerModel;

interface ProcessorInterface
{
    /**
     * @throws \Exception
     *
     * @param array $buyers
     * @param array $bets
     *
     * @return null|WinnerModel
     */
    public function execute(array $buyers = [], array $bets = []): ?WinnerModel;

    /**
     * @throws \Exception
     *
     * @param array $buyers
     * @param array $bets
     *
     * @return null|WinnerModel
     */
    public function executeLightWeight(array $buyers = [], array $bets = []): ?WinnerModel;
}
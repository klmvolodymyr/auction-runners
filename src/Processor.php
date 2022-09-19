<?php

namespace AuctionRunners;

use AuctionRunners\Interfaces\ProcessorInterface;
use AuctionRunners\Model\BetModel;
use AuctionRunners\Model\BuyerModel;
use AuctionRunners\Model\WinnerModel;

class Processor implements ProcessorInterface
{
    private $auctionService;

    public function __construct()
    {
        $this->auctionService = new AuctionService();
    }

    /**
     * @inheritDoc
     */
    public function execute(array $buyers = [], array $bets = []): ?WinnerModel
    {
        // Greedy load
        $auctionId = $this->auctionService->start();
        $buyers = $this->fetchBuyers($auctionId, $buyers, $bets);
        $this->auctionService->loadAuctionMembersActions($auctionId, $buyers);

        return $this->auctionService->getWinner($auctionId);
    }

    /**
     * @inheritDoc
     */
    public function executeLightWeight(array $buyers = [], array $bets = []): ?WinnerModel
    {
        // Lightweight load
        $auctionId = $this->auctionService->start();
        foreach ($this->fetchBuyersGenerator($auctionId, $buyers, $bets) as $member) {
            $this->auctionService->loadAuctionMember($auctionId, $member);
        }

        return $this->auctionService->getWinner($auctionId);
    }

    /**
     * @param string $auctionId
     * @param array  $buyers
     * @param array  $bets
     *
     * @return iterable
     */
    private function fetchBuyersGenerator(string $auctionId, array $buyers = [], array $bets = []): iterable
    {
        foreach ($buyers as $key => $buyer) {
            $b = new BuyerModel($buyer);

            foreach ($bets[$key] as $bet) {
                $b->addBet($auctionId, (new BetModel($bet)));
            }

            yield $b;
        }
    }

    /**
     * @param string $auctionId
     * @param array  $buyers
     * @param array  $bets
     *
     * @return array
     */
    private function fetchBuyers(string $auctionId, array $buyers = [], array $bets = []): array
    {
         $tmp = [];

         foreach ($buyers as $key => $buyer) {
             $b = new BuyerModel($buyer);

             foreach ($bets[$key] as $bet) {
                 $b->addBet($auctionId, (new BetModel($bet)));
             }

             $tmp[] = $b;
         }

         return $tmp;
    }
}
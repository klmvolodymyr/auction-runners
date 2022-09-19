<?php

namespace AuctionRunners\Model;

class BuyerModel 
{
    private ?string $name = null;

    /**
     * @var BetModel[]
     */
    private array $bets = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addBet(string $auctionId, BetModel $bet): void
    {
        if (false === isset($this->bets[$auctionId])) {
            $this->bets[$auctionId] = [];
        }

        $this->bets[$auctionId][] = $bet;
    }

    /**
     * @param string $auctionId
     *
     * @return BetModel[] | array
     */
    public function getAuctionBets(string $auctionId): array
    {
        return true === isset($this->bets[$auctionId]) ? $this->bets[$auctionId] : [];
    }

    /**
     * @return BetModel[]
     */
    public function getAllBets(): array
    {
        return $this->bets;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}

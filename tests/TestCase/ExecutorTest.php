<?php

namespace Tests\TestCase;

use AuctionRunners\Processor;
use PHPUnit\Framework\TestCase;

class ExecutorTest extends TestCase
{
    /**
     * @throws \Exception
     *
     * @param array $buyers
     * @param array $bets
     *
     * @dataProvider heavyExecutionDataProvider
     *
     * @return void
     */
    public function testHeavyExecution(array $buyers, array $bets): void
    {
        $processor = new Processor();
        $winner = $processor->execute($buyers, $bets);
        $this->assertEquals(130, $winner->getPrice());
    }

    /**
     * @param array $buyers
     * @param array $bets
     *
     * @dataProvider heavyExecutionDataProvider
     *
     * @throws \Exception
     *
     * @return void
     */
    public function testExecuteLightWeight(array $buyers, array $bets): void
    {
        $processor = new Processor();
        $winner = $processor->executeLightWeight($buyers, $bets);
        $this->assertEquals(130, $winner->getPrice());
    }

    public function heavyExecutionDataProvider(): array
    {
        return [
            [
                [ 'Arnold', 'Bim', 'Carrol', 'Dan', 'Ell', ],
                [
                    [110, 130],
                    [],
                    [125],
                    [105, 115, 90],
                    [132, 135, 140],
                ]
            ]
        ];
    }
}
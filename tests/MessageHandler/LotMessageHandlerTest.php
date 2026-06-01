<?php

declare(strict_types=1);

namespace App\Tests\MessageHandler;

use App\Message\LotMessage;
use App\Repository\LotRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Messenger\MessageBusInterface;
use Zenstruck\Foundry\Test\ResetDatabase;
use Zenstruck\Messenger\Test\InteractsWithMessenger;

final class LotMessageHandlerTest extends KernelTestCase
{
    use InteractsWithMessenger;
    use ResetDatabase;

    public function testIncomingLotIsPersisted(): void
    {
        self::bootKernel();
        $bus = self::getContainer()->get(MessageBusInterface::class);

        $bus->dispatch(new LotMessage(
            uuid: 'f1e2d3c4-0000-1111-2222-333344445555',
            brand: 'Toyota',
            model: 'Aqua',
            year: 2015,
            mileage: 82_000,
            auctionName: 'USS Tokyo',
            lotNumber: 4242,
            startPrice: 5000,
            endPrice: 7000,
            saleStatus: 'sold',
        ));

        // The message sits on the async transport and is not handled yet.
        $this->transport('async')->queue()->assertCount(1);

        // Run the queue -> LotMessageHandler is invoked.
        $this->transport('async')->process();

        $lots = self::getContainer()->get(LotRepository::class)->findAll();
        self::assertCount(1, $lots);

        $lot = $lots[0];
        self::assertSame('f1e2d3c4-0000-1111-2222-333344445555', $lot->uuid);
        self::assertSame('Toyota', $lot->brand);
        self::assertSame('Aqua', $lot->model);
        self::assertSame(2015, $lot->year);
        self::assertSame(7000, $lot->endPrice);
        self::assertSame('sold', $lot->saleStatus);
    }
}

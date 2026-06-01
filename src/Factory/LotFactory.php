<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Lot;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<Lot>
 */
final class LotFactory extends PersistentObjectFactory
{
    public static function class(): string
    {
        return Lot::class;
    }

    protected function defaults(): array
    {
        return [
            'uuid' => self::faker()->uuid(),
            'brand' => self::faker()->randomElement(['Toyota', 'Honda', 'Nissan', 'Mazda', 'Subaru']),
            'model' => self::faker()->word(),
            'year' => self::faker()->numberBetween(1995, 2024),
            'mileage' => self::faker()->numberBetween(0, 300_000),
            'auctionName' => self::faker()->randomElement(['USS Tokyo', 'TAA Kinki', 'JU Gifu']),
            'lotNumber' => self::faker()->numberBetween(1000, 99_999),
            'startPrice' => self::faker()->numberBetween(1000, 50_000),
            'endPrice' => self::faker()->numberBetween(1000, 50_000),
            'saleStatus' => self::faker()->randomElement(['sold', 'canceled']),
        ];
    }
}

<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Factory\LotFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * Seeds the database with random lots.
 *
 * Run with: bin/console doctrine:fixtures:load
 *
 * The same LotFactory is reused by the tests, so fixtures and tests stay in sync.
 */
final class LotFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // The factory persists the lots itself, so $manager is not used directly.
        LotFactory::createMany(20);
    }
}

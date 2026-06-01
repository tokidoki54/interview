<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Factory\LotFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

final class LotFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        LotFactory::createMany(20);
    }
}

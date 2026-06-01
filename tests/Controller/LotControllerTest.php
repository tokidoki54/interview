<?php

declare(strict_types=1);

namespace App\Tests\Controller;

use App\Factory\LotFactory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Zenstruck\Browser\Test\HasBrowser;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

final class LotControllerTest extends WebTestCase
{
    use Factories;
    use HasBrowser;
    use ResetDatabase;

    public function testIndex(): void
    {
        LotFactory::createOne(['brand' => 'Toyota', 'model' => 'Aqua']);
        LotFactory::createMany(2);

        $this->browser()
            ->visit('/')
            ->assertSuccessful()
            ->assertJson()
            ->assertJsonMatches('length(@)', 3)
            ->assertJsonMatches('[0].brand', 'Toyota')
            ->assertJsonMatches('[0].model', 'Aqua');
    }
}

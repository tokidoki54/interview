<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\LotRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LotRepository::class)]
class Lot
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id = null;

    #[ORM\Column(length: 36)]
    public string $uuid = '';

    #[ORM\Column(length: 100)]
    public string $brand = '';

    #[ORM\Column(length: 100)]
    public string $model = '';

    #[ORM\Column]
    public int $year = 0;

    #[ORM\Column]
    public int $mileage = 0;

    #[ORM\Column(length: 100)]
    public string $auctionName = '';

    #[ORM\Column]
    public int $lotNumber = 0;

    #[ORM\Column]
    public int $startPrice = 0;

    #[ORM\Column]
    public int $endPrice = 0;

    #[ORM\Column(length: 50)]
    public string $saleStatus = '';
}

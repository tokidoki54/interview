<?php

declare(strict_types=1);

namespace App\Message;

final class LotMessage
{
    public function __construct(
        public string $uuid = '',
        public string $brand = '',
        public string $model = '',
        public int $year = 0,
        public int $mileage = 0,
        public string $auctionName = '',
        public int $lotNumber = 0,
        public int $startPrice = 0,
        public int $endPrice = 0,
        public string $saleStatus = '',
    ) {
    }
}

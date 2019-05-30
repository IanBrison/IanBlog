<?php

namespace App\Model\ValueObject;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Exception;

class Date {

    private $carbon;

    private function __construct(CarbonInterface $carbon) {
        $this->carbon = $carbon;
    }

    /**
     * @param string $YYYY_MM_DD
     * @return Date
     * @throws Exception
     */
    public static function createFromYYYY_MM_DD(string $YYYY_MM_DD): self {
        return new self(new Carbon($YYYY_MM_DD));
    }

    public static function now(): self {
        return new self(Carbon::now());
    }

    public function displayYYYY_MM_DD(): string {
        return $this->carbon->format('Y-m-d');
    }
}
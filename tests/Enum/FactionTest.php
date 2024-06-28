<?php

namespace App\Tests\Enum;

use PHPUnit\Framework\TestCase;
use App\Enum\Faction;

class FactionTest extends TestCase
{
    public function testSize(): void
    {
        $cases = Faction::cases();
        $this->assertCount(10, $cases);
    }
}

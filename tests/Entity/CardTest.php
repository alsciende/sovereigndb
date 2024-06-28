<?php

namespace App\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Entity\Card;
use Symfony\Component\Serializer\SerializerInterface;

class CardTest extends KernelTestCase
{
    protected function setUp(): void
    {
        // $this->card = new Card();
    }

    public function testSerializer(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $serializer = $container->get(SerializerInterface::class);

        $json = <<<JSON
{
    "id": "absolution-sphere",
    "name": "Absolution Sphere",
    "faction": "neogenesis-church",
    "attack": null,
    "armor": null,
    "health": null,
    "cost": 4,
    "type": "colony",
    "sub-type": "facility",
    "text": "D: Flip all D who work Absolution Sphere.",
    "flavor": "The first thing to enter the sphere was a young girl, gov-drafted, told nothing. Six days later it spat her out, babbling like a newborn."
}
JSON ;
        $card = $serializer->deserialize($json, Card::class, "json");
        $this->assertInstanceOf(Card::class, $card);
    }
}

<?php

namespace App\Tests\Entity;

use App\Entity\Card;
use App\Enum\Faction;
use App\Enum\Type;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
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

        $json = file_get_contents("data/cards/absolution-sphere.json");
        $card = $serializer->deserialize($json, Card::class, "json");
        $this->assertInstanceOf(Card::class, $card);
    }

    // {
    //     "id": "absolution-sphere",
    //     "name": "Absolution Sphere",
    //     "faction": "neogenesis-church",
    //     "attack": null,
    //     "armor": null,
    //     "health": null,
    //     "cost": 4,
    //     "type": "colony",
    //     "sub-type": [
    //         "facility"
    //     ],
    //     "card_effect": "D: Flip all D who work Absolution Sphere.",
    //     "flavor_text": "The first thing to enter the sphere was a young girl, gov-drafted, told nothing. Six days later it spat her out, babbling like a newborn."
    // }

    public function testValues(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $serializer = $container->get(SerializerInterface::class);

        $json = file_get_contents("tests/assets/absolution-sphere.json");
        $card = $serializer->deserialize($json, Card::class, "json");
        
        dump($card);

        $this->assertEquals("absolution-sphere", $card->getId(), "ID error!");
        $this->assertEquals("Absolution Sphere", $card->getName(), "Name error!");
    $this->assertEquals(Faction::NeogenesisChurch, $card->getFaction(), "Faction error!");
    $this->assertEquals(null, $card->getAttack(), "Attack error!");
    $this->assertEquals(null, $card->getArmor(), "Armor error!");
    $this->assertEquals(null, $card->getHealth(), "Health error!");
    $this->assertEquals(4, $card->getCost(), "Cost error!");
    $this->assertEquals(Type::Colony, $card->getType(), "Type error!");
    $this->assertEquals(['facility'], $card->getSubTypes(), "Sub Types error!");
    $this->assertEquals("D: Flip all D who work Absolution Sphere.", $card->getCardEffect(), "Card Effect error!");
    $this->assertEquals("The first thing to enter the sphere was a young girl, gov-drafted, told nothing. Six days later it spat her out, babbling like a newborn."
        , $card->getFlavorText(), "Flavor Text error!");
    }
}

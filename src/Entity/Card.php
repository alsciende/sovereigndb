<?php

namespace App\Entity;

use App\Repository\CardRepository;
use App\Enum\{Faction, Type};
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity(repositoryClass: CardRepository::class)]
class Card
{
    #[ORM\Id]
    #[ORM\Column(length: 50)]
    private ?string $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(type: Types::STRING, enumType: Faction::class)]
    private ?Faction $faction = null;

    #[ORM\Column(nullable: true)]
    private ?int $attack = null;

    #[ORM\Column(nullable: true)]
    private ?int $armor = null;

    #[ORM\Column(nullable: true)]
    private ?int $health = null;

    #[ORM\Column(nullable: true)]
    private ?int $cost = null;

    #[ORM\Column(type: Types::STRING, enumType: Type::class)]
    private ?Type $type = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY)]
    private ?array $sub_types = null;

    #[ORM\Column(nullable: true, length:1024)]
    private ?string $card_effect = null;

    #[ORM\Column(nullable: true, length:512)]
    private ?string $flavor_text = null;


    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getFaction(): ?Faction
    {
        return $this->faction;
    }

    public function setFaction(Faction $faction): void
    {
        $this->faction = $faction;
    }

    public function setCost(?int $cost): void
    {
        $this->cost = $cost;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(Type $type): void
    {
        $this->type = $type;
    }

    public function getSubTypes(): ?array
    {
        return $this->sub_types;
    }

    public function setSubTypes(array $sub_types): void
    {
        $this->sub_types = $sub_types;
    }
    
    public function getAttack(): ?int
    {
        return $this->attack;
    }

    public function setAttack(?int $attack): void
    {
        $this->attack = $attack;
    }

    public function getArmor(): ?int
    {
        return $this->armor;
    }

    public function setArmor(?int $armor): void
    {
        $this->armor = $armor;
    }

    public function getHealth(): ?int
    {
        return $this->health;
    }

    public function setHealth(?int $health): void
    {
        $this->health = $health;
    }

    public function getCost(): ?int
    {
        return $this->cost;
    }

    public function getCardEffect(): ?string
    {
        return $this->card_effect;
    }

    public function setCardEffect(?string $card_effect): void
    {
        $this->card_effect = $card_effect;
    }

    public function getFlavorText(): ?string
    {
        return $this->flavor_text;
    }

    public function setFlavorText(?string $flavor_text): void
    {
        $this->flavor_text = $flavor_text;
    }
}

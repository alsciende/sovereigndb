<?php
namespace App\Dto;

class CardDto
{
    public string $id;
    public string $name;
    public string $faction;
    public ?int $attack;
    public ?int $armor;
    public ?int $health;
    public int $cost;
    public string $type;
    public array $sub_types;
    public string $card_effect;
    public string $flavor_text;
}
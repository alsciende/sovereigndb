<?php

namespace App\DataFixtures;

use App\Entity\Card;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $card = new Card();
        $card->setId('absolution-sphere');
        $card->setTitle('Absolution Sphere');
        $manager->persist($card);

        $manager->flush();
    }
}

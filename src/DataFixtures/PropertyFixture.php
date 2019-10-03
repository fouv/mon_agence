<?php

namespace App\DataFixtures;

use App\Entity\Property;
use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PropertyFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i=0;$i<100;$i++) {
          $property = new Property();
          $property
            ->setTitle($faker->words(4, true))
            ->setDescription($faker->sentences(3, true))
            ->setSurface($faker->numberBetween(10, 400))
            ->setRooms($faker->numberBetween(1, 10))
            ->setBedrooms($faker->numberBetween(1, 9))
            ->setFloor($faker->numberBetween(0, 30))
            ->setPrice($faker->numberBetween(30000, 900000))
            ->setHeat($faker->numberBetween(0, count(Property::HEAT) -1))
            ->setCity($faker->city)
            ->setAddress($faker->address)
            ->setPostalCode($faker->postcode)
            ->setSold(false);
          $manager->persist($property);
        }

        $manager->flush();
    }
}

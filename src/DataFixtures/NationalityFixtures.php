<?php

namespace App\DataFixtures;

use App\Entity\Nationality;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class NationalityFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach (range(1, 5) as $i) {
            $nationality = new Nationality();
            $nationality->setLibelle('Nationality ' . $i);
            $manager->persist($nationality);
            $this->addReference('nationality_' . $i, $nationality);
        }

        $manager->flush();
    }
}

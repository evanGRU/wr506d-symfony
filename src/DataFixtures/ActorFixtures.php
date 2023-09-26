<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach (range(1,10) as $i){
            $actor = new Actor();
            $actor->setFirstName('FirstName ' . $i);
            $actor->setLastName('LastName ' . $i);
            $manager->persist($actor);
            $this->addReference('actor_'.$i, $actor);
        }

        $manager->flush();
    }
}

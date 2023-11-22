<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ActorFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies(): array
    {
        return [NationalityFixtures::class];
    }

    public function load(ObjectManager $manager): void
    {
        foreach (range(1, 10) as $i) {
            $actor = new Actor();
            $actor->setFirstName('FirstName ' . $i);
            $actor->setLastName('LastName ' . $i);
            $actor->setNationality($this->getReference('nationality_' . rand(1, 5)));
            $manager->persist($actor);
            $this->addReference('actor_' . $i, $actor);
        }

        $manager->flush();
    }
}

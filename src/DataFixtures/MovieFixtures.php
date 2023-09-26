<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach (range(1,5) as $i){
            $movie = new Movie();
            $movie->setTitle('Title ' . $i);
            $movie->setDescription('Description ' . $i);
            $movie->setReleaseDate(new \DateTime());
            $movie->setDuration(rand(60, 180));
            $movie->setCategory($this->getReference('category_' . rand(1, 5)));
            // $movie->addActor($this->getReference('actor_' . rand(1, 10)));

            $actors = [];
            foreach (range(1, rand(2, 6)) as $j){
                $actor = $this->getReference('actor_' . rand(1, 10));
                if (!in_array($actor, $actors)){
                    $actors[] = $actor;
                    $movie->addActor($actor);
                }
            }


            $manager->persist($movie);
        }

        $manager->flush();
    }
}

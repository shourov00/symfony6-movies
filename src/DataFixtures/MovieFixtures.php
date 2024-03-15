<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie = new Movie();
        $movie->setTitle('The Dark Knight');
        $movie->setReleaseYear(2008);
        $movie->setDescription('This is the description of the movie');
        $movie->setImagePath('https://cdn.pixabay.com/photo/2016/09/07/15/48/sunset-1651878_960_720.jpg');

        // add Data to pivot table
        $movie->addActor($this->getReference('actor_1'));
        $movie->addActor($this->getReference('actor_2'));

        $manager->persist($movie);

        $movie2 = new Movie();
        $movie2->setTitle('Iron Man');
        $movie2->setReleaseYear(2008);
        $movie2->setDescription('This is the description first MCU movie');
        $movie2->setImagePath('https://cdn.pixabay.com/photo/2015/04/02/17/56/iron-man-704074_960_720.jpg');

        $movie2->addActor($this->getReference('actor_3'));
        $movie2->addActor($this->getReference('actor_4'));

        $manager->persist($movie2);

        $manager->flush();
    }
}

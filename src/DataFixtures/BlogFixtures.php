<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BlogFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++){

            //Création de 10 post
            $blog = new Post();
            $blog
                ->setTittle("Post " . $i)
                ->setSlug(rand(100, 6000))
                ->setCreationDate($faker->dateTime($max = 'now', $timezone = null))
                ->setPublished("$faker->realtext(1000)")
                ->setPublishedDate($faker->dateTime($max = 'now', $timezone = null))
                ->setContent("")
                ->setImage("");
        
            // Sauvegarde en base    
            $manager->persist($blog);
        }
        // Ecritue effective en base 
        $manager->flush();
    }
}

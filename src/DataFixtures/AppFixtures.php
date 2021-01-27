<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Product;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++){

            //Création d'un produit
            $product = new Product();
            $product
                ->setName("Produit " . $i)
                ->setDescription($faker->realtext(1000))
                ->setImage("")
                ->setPrice(rand(100, 6000));
        
            // Sauvegarde en base    
            $manager->persist($product);
        }
        // Ecritue effective en base 
        $manager->flush();
    }
}

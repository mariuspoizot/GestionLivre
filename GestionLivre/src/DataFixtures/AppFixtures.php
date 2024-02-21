<?php

namespace App\DataFixtures;
use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker ;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker= Faker\Factory::create("fr_FR");
        
        for ($i = 1; $i < 10; $i++) {
            $book = new Book;
            $book->setISBN($faker->regexify('[A-Z]{5}[0-4]{3}'));
            $book->setTitle($faker->name());
            $book->setResume($faker->paragraph());
            $book->setDescription($faker->paragraph());
            $book->setPrice($faker->randomFloat(2,5,1000));
            $manager->persist($book);
        }
     

        $manager->flush();
    }
}

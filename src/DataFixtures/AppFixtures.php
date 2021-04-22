<?php

namespace App\DataFixtures;

use App\Entity\Book;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    //$manager est un service injecté(injection de dépendance)
    public function load(ObjectManager $manager)
    {
        $data = [[
            'title' => "Travail du Bois",
            'cover' => "bois.jpg",
            'parution' => new DateTime('2021/04/21'),
            'resume' => "Tout ce que vous devez savoir sur le travail du Bois",
            'prix' => "15Eur"
        ],[
            'title' => "Forgeron",
            'cover' => "forge.jpg",
            'parution' => new DateTime('2021/02/19'),
            'resume' => "Tout ce que vous devez savoir sur la Forge",
            'prix' => "18Eur"
        ],[
            'title' => "Délicat Papier",
            'cover' => "papier.jpg",
            'parution' => new DateTime('2021/01/06'),
            'resume' => "Tout ce que vous devez savoir sur le travail du Papier",
            'prix' => "17Eur"
        ]];

        foreach ($data as $b) {
            $book = new Book;
            $book
                ->setTitle($b['title'])
                ->setCover($b['cover'])
                ->setParution($b['parution'])
                ->setResume($b['resume'])
                ->setPrix($b['prix']);

            $manager -> persist($book);
            
        }
        // flush en dehors la boucle
        $manager->flush();
    }
}

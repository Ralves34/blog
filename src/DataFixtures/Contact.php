<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Contact extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $contacts = [
            new \App\Entity\Contact('Alves', 'Lucas', 'yooo@gmail.com', '28',  false),
            new \App\Entity\Contact('Kylian', 'Mbappe', 'tortueninja@gmail.com', '25', true),
            new \App\Entity\Contact('Mé na', 'Mé si', 'mesimenan@gmail.com', '24', true),
            new \App\Entity\Contact('Elodie', 'costa', 'elodie@gmail.com', '23', true)
            
        ];

        foreach ($contacts as $contact) {
            $manager->persist($contact);
        }
        $manager->flush();
    }
}

<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Contact extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $contacts = [
            new \App\Entity\Contact('Alves', 'Lucas', 'yooo@gmail.com', 'yolo', 'yoplait', false),
            new \App\Entity\Contact('Kylian', 'Mbappe', 'tortueninja@gmail.com', 'im fast as fuck boi', 'ptet', true),
            new \App\Entity\Contact('Mé na', 'Mé si', 'mesimenan@gmail.com', 'omg', 'peux vnir stp', true),
            new \App\Entity\Contact('Elodie', 'costa', 'elodie@gmail.com', 'ouii', 'est ce que elodie mesure 6 ihpones', true)
            
        ];

        foreach ($contacts as $contact) {
            $manager->persist($contact);
        }
        $manager->flush();
    }
}
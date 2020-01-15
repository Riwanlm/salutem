<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $contact = new Contact();
        $contact->setEmail("contact@salutem.fr");
        $contact->setPhone("0243654125");
        $contact->setPhoneEmergency("0243854713");
        $manager->persist($contact);

        $manager->flush();
    }
}

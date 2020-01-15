<?php

namespace App\DataFixtures;

use App\Entity\Doctor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class DoctorFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $jack = new Doctor();
        $jack->setFirstname("Jack");
        $jack->setLastname("Smith");
        $jack->setPhoto("doctor-1.jpg");
        $jack->setDescription("Lorem ipsum...");
        $jack->addSkill($this->getReference("skill-homeopathe"));
        $jack->addSkill($this->getReference("skill-dentiste"));
        $manager->persist($jack);

        $norma = new Doctor();
        $norma->setFirstname("Norma");
        $norma->setLastname("Pedric");
        $norma->setPhoto("doctor-2.jpg");
        $norma->setDescription("La description de Norma...");
        $manager->persist($norma);

        $maria = new Doctor();
        $maria->setFirstname("Maria");
        $maria->setLastname("Martin");
        $maria->setPhoto("doctor-3.jpg");
        $maria->setDescription("Hi there!");
        $maria->addSkill($this->getReference("skill-dentiste"));
        $manager->persist($maria);

        $manager->flush();
    }

    /**
     * @inheritDoc
     */
    public function getDependencies()
    {
        return [
            SkillFixtures::class
        ];
    }
}

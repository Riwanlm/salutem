<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;

class UserFixtures extends Fixture
{
    private $encoder;

    /**
     * UserFixtures constructor.
     */
    public function  __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
         $admin = new User();
         $admin->setEmail("pierre.jehan@gmail.com");
         $admin->setPassword($this->encoder->encodePassword($admin, "pjehan"));
         $admin->setRoles(["ROLE_ADMIN"]);
         $manager->persist($admin);

        $manager->flush();
    }
}

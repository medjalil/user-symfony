<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder) {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager) {
        $admin = new User();     
        $admin->setEmail('med.abdeljalil@gmail.com');
        $admin->setPassword($this->passwordEncoder->encodePassword($admin, 'password'));
        $admin->setRoles(array('ROLE_USER'));
        $manager->persist($admin);
        $manager->flush();
    }

}

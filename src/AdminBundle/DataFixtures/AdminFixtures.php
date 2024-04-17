<?php

namespace App\AdminBundle\DataFixtures;

use App\AppBundle\Entity\User;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setEmail('admin@bastardsoundsystem.org')
            ->setPassword($this->passwordHasher->hashPassword($admin, 'admin'))
            ->setRoles(['ROLE_ADMIN'])
            ->setFirstname('Administrateur')
            ->setLastname('Général')
            ->setPseudo('admin')
            ->setCreatedAt(new DateTimeImmutable());
        $manager->persist($admin);

        $manager->flush();
    }
}

<?php

namespace App\PartenaireBundle\DataFixtures;

use App\PartenaireBundle\Entity\Partenaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use DateTimeImmutable;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class PartenaireFixtures extends Fixture implements OrderedFixtureInterface
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $partenaire = new Partenaire();
        $partenaire->setEmail('partenaire@bastardsoundsystem.org')
            ->setPassword($this->passwordHasher->hashPassword($partenaire, 'partenaire'))
            ->setRoles(['ROLE_PARTENAIRE'])
            ->setName('Partenaire Test')
            ->setPseudo('partenaire')
            ->setPhone('01.02.03.04.05')
            ->setPartenaireType('Organisateur')
            ->setCompanyName('Compagnie test')
            ->setCreatedAt(new DateTimeImmutable());
        $manager->persist($partenaire);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 3;
    }
}

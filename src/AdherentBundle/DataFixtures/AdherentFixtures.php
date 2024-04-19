<?php

namespace App\AdherentBundle\DataFixtures;

use App\AdherentBundle\Entity\Adherent;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use DateTimeImmutable;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdherentFixtures extends Fixture implements OrderedFixtureInterface
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $adherent = new Adherent();
        $adherent->setEmail('adherent@bastardsoundsystem.org')
            ->setPassword($this->passwordHasher->hashPassword($adherent, 'adherent'))
            ->setRoles(['ROLE_ADHERENT'])
            ->setName('Adhérent Test')
            ->setPseudo('adherent')
            ->setPhone('01.02.03.04.05')
            ->setAdherentType('Musicien')
            ->setCreatedAt(new DateTimeImmutable());
        $manager->persist($adherent);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 2;
    }
}

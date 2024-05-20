<?php

namespace App\DataFixtures;

use App\Entity\Partner\Partner;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class PartnerFixtures extends Fixture implements OrderedFixtureInterface
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $partner = new Partner();
        $partner->setEmail('partner@bastardsoundsystem.org')
            ->setPassword($this->passwordHasher->hashPassword($partner, 'partner'))
            ->setRoles(['ROLE_PARTNER'])
            ->setFirstname('Partenaire')
            ->setLastname('BSS')
            ->setPseudo('partenaire')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setPartnerType('Salle de spectacles')
            ->setActive(true);
        $manager->persist($partner);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 5;
    }
}

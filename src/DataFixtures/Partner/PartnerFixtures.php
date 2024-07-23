<?php

namespace App\DataFixtures\Partner;

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
            ->setPassword($this->passwordHasher->hashPassword($partner, '!bEb7RgDFJM?'))
            ->setRoles(['ROLE_PARTNER'])
            ->setFirstname('Partenaire')
            ->setLastname('BSS')
            ->setPseudo('partenaire')
            ->setPhone('01.02.03.04.05')
            ->setAddress1('1, rue des bobs')
            ->setZipcode('12345')
            ->setCity('Bobville')
            ->setCountry('France')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setPartnerType('Organisateur')
            ->setActive(true);
        $manager->persist($partner);

        $partner = new Partner();
        $partner->setEmail('partner2@bastardsoundsystem.org')
            ->setPassword($this->passwordHasher->hashPassword($partner, '!bEb7RgDFJM?'))
            ->setRoles(['ROLE_PARTNER'])
            ->setFirstname('Partenaire')
            ->setLastname('Archivé')
            ->setPseudo('archivé')
            ->setPhone('01.02.03.04.05')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setPartnerType('Organisateur')
            ->setActive(false)
            ->setArchivedAt(new \DateTimeImmutable())
            ->setArchivedCause('Parce que');
        $manager->persist($partner);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 6;
    }
}

<?php

namespace App\AppBundle\DataFixtures;

use App\AppBundle\Entity\Informations;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use DateTimeImmutable;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class InformationsFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $informations = new Informations();
        $informations->setEmail('contact@bastardsoundsystem.org')
            ->setName('Bastard Sound System')
            ->setPhone('06.83.57.30.67')
            ->setAddress('38 rue du cheval blanc, 23230 Gouzon');
        $manager->persist($informations);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 7;
    }
}

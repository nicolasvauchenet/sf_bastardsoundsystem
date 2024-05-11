<?php

namespace App\DataFixtures;

use App\Entity\Parameters;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ParametersFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $parameters = (new Parameters())
            ->setAppName('Bastard Sound System')
            ->setAppEmail('contact@bastardsoundsystem.org');
        $manager->persist($parameters);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 1;
    }
}

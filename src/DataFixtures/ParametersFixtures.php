<?php

namespace App\DataFixtures;

use App\Entity\BackOffice\Administration\Parameters\Parameters;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ParametersFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $parameters = (new Parameters())
            ->setAppName('Bastard Sound System')
            ->setAppEmail('contact@bastardsoundsystem.org')
            ->setAppPhone('0683573067')
            ->setAppMembershipFee(12);
        $manager->persist($parameters);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 1;
    }
}

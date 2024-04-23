<?php

namespace App\AdminBundle\DataFixtures;

use App\AdminBundle\Entity\Cotisation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CotisationFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $today = new \DateTimeImmutable();
        $cotisation = (new Cotisation())
            ->setAdherent($this->getReference('adherent-test'))
            ->setStatus('ok')
            ->setPaidAt($today->modify('-1 year +31 days'))
            ->setNextAt($today->modify('+31 days'));
        $manager->persist($cotisation);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 8;
    }
}

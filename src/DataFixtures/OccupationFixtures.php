<?php

namespace App\DataFixtures;

use App\Entity\Occupation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class OccupationFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $occupation = (new Occupation())
            ->setName('Photo')
            ->setIcon('typcn:camera')
            ->setActive(true);
        $manager->persist($occupation);
        $this->addReference('occupation-photo', $occupation);

        $occupation = (new Occupation())
            ->setName('Vidéo')
            ->setIcon('typcn:video')
            ->setActive(true);
        $manager->persist($occupation);
        $this->addReference('occupation-video', $occupation);

        $occupation = (new Occupation())
            ->setName('Studio')
            ->setIcon('fluent-emoji-high-contrast:studio-microphone')
            ->setActive(true);
        $manager->persist($occupation);
        $this->addReference('occupation-studio', $occupation);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 6;
    }
}

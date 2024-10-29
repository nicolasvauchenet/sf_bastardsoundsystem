<?php

namespace App\DataFixtures;

use App\Entity\Specialty;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SpecialtyFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $specialty = (new Specialty())
            ->setName('Live')
            ->setIcon('game-icons:drum-kit')
            ->setActive(true);
        $manager->persist($specialty);
        $this->addReference('specialty-live', $specialty);

        $specialty = (new Specialty())
            ->setName('Portraits de groupes')
            ->setIcon('carbon:events')
            ->setActive(true);
        $manager->persist($specialty);
        $this->addReference('specialty-portraits-de-groupes', $specialty);

        $specialty = (new Specialty())
            ->setName('Clips')
            ->setIcon('fontisto:film')
            ->setActive(true);
        $manager->persist($specialty);
        $this->addReference('specialty-clips', $specialty);

        $specialty = (new Specialty())
            ->setName('Enregistrement')
            ->setIcon('fluent:mic-record-20-filled')
            ->setActive(true);
        $manager->persist($specialty);
        $this->addReference('specialty-enregistrement', $specialty);

        $specialty = (new Specialty())
            ->setName('Mixage')
            ->setIcon('material-symbols:instant-mix')
            ->setActive(true);
        $manager->persist($specialty);
        $this->addReference('specialty-mixage', $specialty);

        $specialty = (new Specialty())
            ->setName('Mastering')
            ->setIcon('icon-park-solid:record-disc')
            ->setActive(true);
        $manager->persist($specialty);
        $this->addReference('specialty-mastering', $specialty);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 7;
    }
}

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
            ->setActive(true)
            ->addPartner($this->getReference('user-laeti-d-photos'))
            ->addPartner($this->getReference('user-cedric-carre'))
            ->addPartner($this->getReference('user-shadoworkprod'))
            ->addPartner($this->getReference('user-imaginaerum-studio'));
        $manager->persist($specialty);

        $specialty = (new Specialty())
            ->setName('Portraits de groupes')
            ->setIcon('carbon:events')
            ->setActive(true)
            ->addPartner($this->getReference('user-laeti-d-photos'));
        $manager->persist($specialty);

        $specialty = (new Specialty())
            ->setName('Clips')
            ->setIcon('fontisto:film')
            ->setActive(true)
            ->addPartner($this->getReference('user-shadoworkprod'))
            ->addPartner($this->getReference('user-imaginaerum-studio'));
        $manager->persist($specialty);

        $specialty = (new Specialty())
            ->setName('Enregistrement')
            ->setIcon('fluent:mic-record-20-filled')
            ->setActive(true)
            ->addPartner($this->getReference('user-philae-studio'))
            ->addPartner($this->getReference('user-tweed-studio'));
        $manager->persist($specialty);

        $specialty = (new Specialty())
            ->setName('Mixage')
            ->setIcon('material-symbols:instant-mix')
            ->setActive(true)
            ->addPartner($this->getReference('user-philae-studio'))
            ->addPartner($this->getReference('user-tweed-studio'));
        $manager->persist($specialty);

        $specialty = (new Specialty())
            ->setName('Mastering')
            ->setIcon('icon-park-solid:record-disc')
            ->setActive(true)
            ->addPartner($this->getReference('user-tweed-studio'));
        $manager->persist($specialty);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 6;
    }
}

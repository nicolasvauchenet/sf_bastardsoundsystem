<?php

namespace App\FrontOfficeBundle\DataFixtures;

use App\FrontOfficeBundle\Entity\Partenariat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use DateTimeImmutable;

class PartenariatFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $partenariat = new Partenariat();
        $partenariat->setPartenaireType('Organisateur')
            ->setPartenaireEmail('johnlennon@bastardsoundsystem.org')
            ->setPartenaireName('CCM John Lennon')
            ->setPartenaireMessage("Salle de concert musique actuelles d'une capacité de 650 places debout.")
            ->setSentAt(new DateTimeImmutable());
        $manager->persist($partenariat);

        $partenariat = new Partenariat();
        $partenariat->setPartenaireType('Studio')
            ->setPartenaireEmail('philae@bastardsoundsystem.org')
            ->setPartenaireName('Philae Studio')
            ->setPartenaireMessage("Enregistrement d’artistes solo ou en groupe - Réalisation de maquettes / démo - Réalisation d’EP ou LP  - Mixage de vos pistes / stems")
            ->setSentAt(new DateTimeImmutable());
        $manager->persist($partenariat);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 5;
    }
}

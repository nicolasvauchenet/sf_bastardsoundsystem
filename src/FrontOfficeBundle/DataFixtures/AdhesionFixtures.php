<?php

namespace App\FrontOfficeBundle\DataFixtures;

use App\FrontOfficeBundle\Entity\Adhesion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AdhesionFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $adhesion = new Adhesion();
        $adhesion->setAdherentType('Musicien')
            ->setAdherentEmail('bob@bastardsoundsystem.org')
            ->setAdherentName('Bob Marley')
            ->setAdherentMessage("Robert Nesta Marley dit Bob Marley, né le 6 février 1945 à Nine Miles et mort à 36 ans le 11 mai 1981 à Miami d'un cancer, est un auteur-compositeur-interprète et guitariste jamaïcain.")
            ->setSentAt(new \DateTimeImmutable());
        $manager->persist($adhesion);

        $adhesion = new Adhesion();
        $adhesion->setAdherentType('Groupe')
            ->setAdherentEmail('feelarsen@bastardsoundsystem.org')
            ->setAdherentName('Féelarsen')
            ->setAdherentMessage("La preuve que le rock français n’est pas mort ! Originaire de Limoges, Féelarsen est avant tout taillé pour la scène. Depuis maintenant deux ans, le groupe trace sa route en enchaînant les concerts dans les bars, les premières parties des Ramoneurs de Menhirs, des Sales majestés… Les textes inspirés et mordants, accompagnés d’un son travaillé et fourni, donnent du corps à une critique assaisonnée de la société. Les mélodies sauce piquante, une rythmique impeccable et des guitares acérées où l’on frôle un esprit joyeusement bordélique. Bref, en un mot : délicieusement rock’n’roll !")
            ->setSentAt(new \DateTimeImmutable());
        $manager->persist($adhesion);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 4;
    }
}

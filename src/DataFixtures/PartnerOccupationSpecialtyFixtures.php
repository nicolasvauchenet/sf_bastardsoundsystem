<?php

namespace App\DataFixtures;

use App\Entity\PartnerOccupationSpecialty;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PartnerOccupationSpecialtyFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $partnerOccupationSpecialty = (new PartnerOccupationSpecialty())
            ->setPartner($this->getReference('user-laeti-d-photos'))
            ->setOccupation($this->getReference('occupation-photo'))
            ->setSpecialty($this->getReference('specialty-live'))
            ->setActive(true);
        $manager->persist($partnerOccupationSpecialty);

        $partnerOccupationSpecialty = (new PartnerOccupationSpecialty())
            ->setPartner($this->getReference('user-laeti-d-photos'))
            ->setOccupation($this->getReference('occupation-photo'))
            ->setSpecialty($this->getReference('specialty-portraits-de-groupes'))
            ->setActive(true);
        $manager->persist($partnerOccupationSpecialty);

        $partnerOccupationSpecialty = (new PartnerOccupationSpecialty())
            ->setPartner($this->getReference('user-cedric-carre'))
            ->setOccupation($this->getReference('occupation-photo'))
            ->setSpecialty($this->getReference('specialty-live'))
            ->setActive(true);
        $manager->persist($partnerOccupationSpecialty);

        $partnerOccupationSpecialty = (new PartnerOccupationSpecialty())
            ->setPartner($this->getReference('user-imaginaerum-studio'))
            ->setOccupation($this->getReference('occupation-photo'))
            ->setSpecialty($this->getReference('specialty-live'))
            ->setActive(true);
        $manager->persist($partnerOccupationSpecialty);

        $partnerOccupationSpecialty = (new PartnerOccupationSpecialty())
            ->setPartner($this->getReference('user-imaginaerum-studio'))
            ->setOccupation($this->getReference('occupation-photo'))
            ->setSpecialty($this->getReference('specialty-portraits-de-groupes'))
            ->setActive(true);
        $manager->persist($partnerOccupationSpecialty);

        $partnerOccupationSpecialty = (new PartnerOccupationSpecialty())
            ->setPartner($this->getReference('user-imaginaerum-studio'))
            ->setOccupation($this->getReference('occupation-video'))
            ->setSpecialty($this->getReference('specialty-live'))
            ->setActive(true);
        $manager->persist($partnerOccupationSpecialty);

        $partnerOccupationSpecialty = (new PartnerOccupationSpecialty())
            ->setPartner($this->getReference('user-imaginaerum-studio'))
            ->setOccupation($this->getReference('occupation-video'))
            ->setSpecialty($this->getReference('specialty-clips'))
            ->setActive(true);
        $manager->persist($partnerOccupationSpecialty);

        $partnerOccupationSpecialty = (new PartnerOccupationSpecialty())
            ->setPartner($this->getReference('user-shadoworkprod'))
            ->setOccupation($this->getReference('occupation-video'))
            ->setSpecialty($this->getReference('specialty-live'))
            ->setActive(true);
        $manager->persist($partnerOccupationSpecialty);

        $partnerOccupationSpecialty = (new PartnerOccupationSpecialty())
            ->setPartner($this->getReference('user-shadoworkprod'))
            ->setOccupation($this->getReference('occupation-video'))
            ->setSpecialty($this->getReference('specialty-clips'))
            ->setActive(true);
        $manager->persist($partnerOccupationSpecialty);

        $partnerOccupationSpecialty = (new PartnerOccupationSpecialty())
            ->setPartner($this->getReference('user-philae-studio'))
            ->setOccupation($this->getReference('occupation-studio'))
            ->setSpecialty($this->getReference('specialty-enregistrement'))
            ->setActive(true);
        $manager->persist($partnerOccupationSpecialty);

        $partnerOccupationSpecialty = (new PartnerOccupationSpecialty())
            ->setPartner($this->getReference('user-philae-studio'))
            ->setOccupation($this->getReference('occupation-studio'))
            ->setSpecialty($this->getReference('specialty-mixage'))
            ->setActive(true);
        $manager->persist($partnerOccupationSpecialty);

        $partnerOccupationSpecialty = (new PartnerOccupationSpecialty())
            ->setPartner($this->getReference('user-tweed-studio'))
            ->setOccupation($this->getReference('occupation-studio'))
            ->setSpecialty($this->getReference('specialty-enregistrement'))
            ->setActive(true);
        $manager->persist($partnerOccupationSpecialty);

        $partnerOccupationSpecialty = (new PartnerOccupationSpecialty())
            ->setPartner($this->getReference('user-tweed-studio'))
            ->setOccupation($this->getReference('occupation-studio'))
            ->setSpecialty($this->getReference('specialty-mixage'))
            ->setActive(true);
        $manager->persist($partnerOccupationSpecialty);

        $partnerOccupationSpecialty = (new PartnerOccupationSpecialty())
            ->setPartner($this->getReference('user-tweed-studio'))
            ->setOccupation($this->getReference('occupation-studio'))
            ->setSpecialty($this->getReference('specialty-mastering'))
            ->setActive(true);
        $manager->persist($partnerOccupationSpecialty);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 8;
    }
}

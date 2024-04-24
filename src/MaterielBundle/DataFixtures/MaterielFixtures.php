<?php

namespace App\MaterielBundle\DataFixtures;

use App\MaterielBundle\Entity\Materiel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MaterielFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $materiel = (new Materiel())
            ->setCategory($this->getReference('category-sonorisation'))
            ->setName('Elokance ELO 1500')
            ->setStatus('Hors service')
            ->setPurchasePrice(800)
            ->setArgusPrice(850)
            ->setCreatedAt(new \DateTimeImmutable("2022-08-16 00:00:00"))
            ->setUpdatedAt(new \DateTimeImmutable("2024-04-23 00:00:00"));
        $manager->persist($materiel);

        $materiel = (new Materiel())
            ->setCategory($this->getReference('category-sonorisation'))
            ->setName('Alto TSSUB18')
            ->setStatus('Ok')
            ->setPurchasePrice(150)
            ->setArgusPrice(250)
            ->setCreatedAt(new \DateTimeImmutable("2022-08-16 00:00:00"))
            ->setUpdatedAt(new \DateTimeImmutable("2022-08-16 00:00:00"));
        $manager->persist($materiel);

        $materiel = (new Materiel())
            ->setCategory($this->getReference('category-sonorisation'))
            ->setName('Alto TSSUB18')
            ->setStatus('Ok')
            ->setPurchasePrice(150)
            ->setArgusPrice(250)
            ->setCreatedAt(new \DateTimeImmutable("2022-08-16 00:00:00"))
            ->setUpdatedAt(new \DateTimeImmutable("2022-08-16 00:00:00"));
        $manager->persist($materiel);

        $materiel = (new Materiel())
            ->setCategory($this->getReference('category-mixage'))
            ->setName('Allen & Heath QU-16 Chrome Edition')
            ->setStatus('Ok')
            ->setPurchasePrice(3168)
            ->setArgusPrice(1400)
            ->setInvoice('facture-4229922.pdf')
            ->setCreatedAt(new \DateTimeImmutable("2023-03-31 12:21:21"))
            ->setUpdatedAt(new \DateTimeImmutable("2023-03-31 12:21:21"));
        $manager->persist($materiel);

        $materiel = (new Materiel())
            ->setCategory($this->getReference('category-microphone'))
            ->setName('ADK A51-S')
            ->setStatus('Ok')
            ->setPurchasePrice(200)
            ->setArgusPrice(100)
            ->setCreatedAt(new \DateTimeImmutable("2006-10-09 00:00:00"))
            ->setUpdatedAt(new \DateTimeImmutable("2006-10-09 00:00:00"));
        $manager->persist($materiel);

        $materiel = (new Materiel())
            ->setCategory($this->getReference('category-microphone'))
            ->setName('ADK A51-S')
            ->setStatus('Ok')
            ->setPurchasePrice(200)
            ->setArgusPrice(100)
            ->setCreatedAt(new \DateTimeImmutable("2006-10-09 00:00:00"))
            ->setUpdatedAt(new \DateTimeImmutable("2006-10-09 00:00:00"));
        $manager->persist($materiel);

        $materiel = (new Materiel())
            ->setCategory($this->getReference('category-microphone'))
            ->setName('Shure Beta52')
            ->setStatus('Ok')
            ->setPurchasePrice(185)
            ->setArgusPrice(105.88)
            ->setInvoice('facture-4343385.pdf')
            ->setCreatedAt(new \DateTimeImmutable("2023-10-01 00:00:00"))
            ->setUpdatedAt(new \DateTimeImmutable("2006-10-01 00:00:00"));
        $manager->persist($materiel);

        $materiel = (new Materiel())
            ->setCategory($this->getReference('category-microphone'))
            ->setName('Shure SM57')
            ->setStatus('Ok')
            ->setPurchasePrice(105)
            ->setArgusPrice(76.19)
            ->setInvoice('facture-61387907.pdf')
            ->setCreatedAt(new \DateTimeImmutable("2022-06-29 00:00:00"))
            ->setUpdatedAt(new \DateTimeImmutable("2022-06-29 00:00:00"));
        $manager->persist($materiel);

        $materiel = (new Materiel())
            ->setCategory($this->getReference('category-microphone'))
            ->setName('Shure SM57')
            ->setStatus('Ok')
            ->setPurchasePrice(105)
            ->setArgusPrice(76.19)
            ->setInvoice('facture-61387907.pdf')
            ->setCreatedAt(new \DateTimeImmutable("2022-06-29 00:00:00"))
            ->setUpdatedAt(new \DateTimeImmutable("2022-06-29 00:00:00"));
        $manager->persist($materiel);

        $materiel = (new Materiel())
            ->setCategory($this->getReference('category-microphone'))
            ->setName('Shure SM58')
            ->setStatus('Ok')
            ->setPurchasePrice(109)
            ->setArgusPrice(74.50)
            ->setInvoice('facture-4311779.pdf')
            ->setCreatedAt(new \DateTimeImmutable("2023-08-17 00:00:00"))
            ->setUpdatedAt(new \DateTimeImmutable("2023-08-17 00:00:00"));
        $manager->persist($materiel);

        $materiel = (new Materiel())
            ->setCategory($this->getReference('category-microphone'))
            ->setName('Shure SM58')
            ->setStatus('Ok')
            ->setPurchasePrice(109)
            ->setArgusPrice(74.50)
            ->setInvoice('facture-4311779.pdf')
            ->setCreatedAt(new \DateTimeImmutable("2023-08-17 00:00:00"))
            ->setUpdatedAt(new \DateTimeImmutable("2023-08-17 00:00:00"));
        $manager->persist($materiel);

        $materiel = (new Materiel())
            ->setCategory($this->getReference('category-microphone'))
            ->setName('Sennheiser e609')
            ->setStatus('Ok')
            ->setPurchasePrice(92)
            ->setArgusPrice(65)
            ->setInvoice('facture-4343385.pdf')
            ->setCreatedAt(new \DateTimeImmutable("2023-10-01 00:00:00"))
            ->setUpdatedAt(new \DateTimeImmutable("2006-10-01 00:00:00"));
        $manager->persist($materiel);

        $materiel = (new Materiel())
            ->setCategory($this->getReference('category-microphone'))
            ->setName('Sennheiser e609')
            ->setStatus('Ok')
            ->setPurchasePrice(92)
            ->setArgusPrice(65)
            ->setInvoice('facture-4343385.pdf')
            ->setCreatedAt(new \DateTimeImmutable("2023-10-01 00:00:00"))
            ->setUpdatedAt(new \DateTimeImmutable("2006-10-01 00:00:00"));
        $manager->persist($materiel);

        $materiel = (new Materiel())
            ->setCategory($this->getReference('category-microphone'))
            ->setName('Behringer C-1')
            ->setStatus('Ok')
            ->setPurchasePrice(45)
            ->setArgusPrice(20)
            ->setInvoice('facture-4343385.pdf')
            ->setCreatedAt(new \DateTimeImmutable("2006-10-09 00:00:00"))
            ->setUpdatedAt(new \DateTimeImmutable("2006-10-09 00:00:00"));
        $manager->persist($materiel);

        $materiel = (new Materiel())
            ->setCategory($this->getReference('category-microphone'))
            ->setName('Shure BG1.0')
            ->setStatus('Ok')
            ->setPurchasePrice(30)
            ->setArgusPrice(17)
            ->setCreatedAt(new \DateTimeImmutable("2006-10-09 00:00:00"))
            ->setUpdatedAt(new \DateTimeImmutable("2006-10-09 00:00:00"));
        $manager->persist($materiel);

        $materiel = (new Materiel())
            ->setCategory($this->getReference('category-microphone'))
            ->setName('Shure MX M202')
            ->setStatus('Ok')
            ->setPurchasePrice(200)
            ->setArgusPrice(100)
            ->setCreatedAt(new \DateTimeImmutable("2006-10-09 00:00:00"))
            ->setUpdatedAt(new \DateTimeImmutable("2006-10-09 00:00:00"));
        $manager->persist($materiel);

        $materiel = (new Materiel())
            ->setCategory($this->getReference('category-stand'))
            ->setName('K&M 25900 STAND')
            ->setStatus('Ok')
            ->setPurchasePrice(69)
            ->setArgusPrice(40)
            ->setInvoice('facture-4343385.pdf')
            ->setCreatedAt(new \DateTimeImmutable("2023-10-01 00:00:00"))
            ->setUpdatedAt(new \DateTimeImmutable("2006-10-01 00:00:00"));
        $manager->persist($materiel);

        $materiel = (new Materiel())
            ->setCategory($this->getReference('category-informatique'))
            ->setName('TRANSCEND StoreJet 25H3B 4To')
            ->setStatus('Ok')
            ->setPurchasePrice(148.38)
            ->setArgusPrice(90)
            ->setInvoice('facture-FR327JVSQAEUI.pdf')
            ->setCreatedAt(new \DateTimeImmutable("2023-09-25 00:00:00"))
            ->setUpdatedAt(new \DateTimeImmutable("2006-09-25 00:00:00"));
        $manager->persist($materiel);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 10;
    }
}

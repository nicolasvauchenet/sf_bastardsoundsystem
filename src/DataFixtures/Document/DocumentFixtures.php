<?php

namespace App\DataFixtures\Document;

use App\Entity\Document\Document;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class DocumentFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $document = (new Document())
            ->setCategory($this->getReference('document-category-legaux'))
            ->setName("Procès-Verbal de l'Assemblée Générale Constitutive")
            ->setFilename('pv-assemblee-generale-constitutive.pdf')
            ->setActive(true);
        $manager->persist($document);

        $document = (new Document())
            ->setCategory($this->getReference('document-category-legaux'))
            ->setName("Statuts de l'association")
            ->setFilename('statuts.pdf')
            ->setActive(true);
        $manager->persist($document);

        $document = (new Document())
            ->setCategory($this->getReference('document-category-legaux'))
            ->setName("Attestation d'inscription au répertoire SIREN")
            ->setFilename('inscription-siren.pdf')
            ->setActive(true);
        $manager->persist($document);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 10;
    }
}

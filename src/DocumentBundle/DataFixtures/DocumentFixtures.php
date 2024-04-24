<?php

namespace App\DocumentBundle\DataFixtures;

use App\DocumentBundle\Entity\Document;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class DocumentFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $document = (new Document())
            ->setCategory($this->getReference('category-officiel'))
            ->setName("Statuts de l'association")
            ->setFilename('statuts.pdf')
            ->setStatus('En ligne')
            ->setCreatedAt(new \DateTimeImmutable("2024-04-08 18:00:00"))
            ->setUpdatedAt(new \DateTimeImmutable("2024-04-08 18:00:00"));
        $manager->persist($document);

        $document = (new Document())
            ->setCategory($this->getReference('category-officiel'))
            ->setName("Procès-verbal de l'Assemblée Générale Constitutive")
            ->setFilename('pv-assemblee-generale-constitutive.pdf')
            ->setStatus('En ligne')
            ->setCreatedAt(new \DateTimeImmutable("2024-04-08 18:00:00"))
            ->setUpdatedAt(new \DateTimeImmutable("2024-04-08 18:00:00"));
        $manager->persist($document);

        $document = (new Document())
            ->setCategory($this->getReference('category-officiel'))
            ->setName("Inscription au répertoire SIREN")
            ->setFilename('inscription-siren.pdf')
            ->setStatus('En ligne')
            ->setCreatedAt(new \DateTimeImmutable("2024-04-16 12:00:00"))
            ->setUpdatedAt(new \DateTimeImmutable("2024-04-16 12:00:00"));
        $manager->persist($document);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 12;
    }
}

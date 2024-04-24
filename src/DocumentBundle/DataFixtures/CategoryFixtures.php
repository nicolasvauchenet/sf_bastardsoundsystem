<?php

namespace App\DocumentBundle\DataFixtures;

use App\DocumentBundle\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $category = (new Category())
            ->setName('Officiel');
        $manager->persist($category);
        $this->addReference('category-officiel', $category);

        $category = (new Category())
            ->setName('Procès-verbaux');
        $manager->persist($category);
        $this->addReference('category-pv', $category);

        $category = (new Category())
            ->setName('Justificatifs');
        $manager->persist($category);
        $this->addReference('category-justificatifs', $category);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 11;
    }
}

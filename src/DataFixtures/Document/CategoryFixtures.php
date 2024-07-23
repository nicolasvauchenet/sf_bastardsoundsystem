<?php

namespace App\DataFixtures\Document;

use App\Entity\Document\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $category = (new Category())
            ->setName('Documents légaux')
            ->setPosition(1)
            ->setActive(true);
        $manager->persist($category);
        $this->addReference('document-category-legaux', $category);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 9;
    }
}

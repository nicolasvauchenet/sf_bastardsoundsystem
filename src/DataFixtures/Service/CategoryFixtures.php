<?php

namespace App\DataFixtures\Service;

use App\Entity\Service\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $category = (new Category())
            ->setName('Technique')
            ->setIcon('fa-solid:tools')
            ->setPosition(1)
            ->setActive(true);
        $manager->persist($category);
        $this->addReference('service-category-technique', $category);

        $category = (new Category())
            ->setName('Management')
            ->setIcon('eos-icons:subscription-management')
            ->setPosition(2)
            ->setActive(true);
        $manager->persist($category);
        $this->addReference('service-category-management', $category);

        $category = (new Category())
            ->setName('Organisation')
            ->setIcon('clarity:organization-solid')
            ->setPosition(3)
            ->setActive(true);
        $manager->persist($category);
        $this->addReference('service-category-organisation', $category);

        $category = (new Category())
            ->setName('Production')
            ->setIcon('streamline:wifi-antenna-solid')
            ->setPosition(4)
            ->setActive(true);
        $manager->persist($category);
        $this->addReference('service-category-production', $category);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 2;
    }
}

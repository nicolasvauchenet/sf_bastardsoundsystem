<?php

namespace App\DataFixtures\Equipment;

use App\Entity\Equipment\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $category = (new Category())
            ->setName('Microphones')
            ->setPosition(1)
            ->setActive(true);
        $manager->persist($category);
        $this->addReference('equipment-category-microphones', $category);

        $category = (new Category())
            ->setName('Sonorisation FOH')
            ->setPosition(2)
            ->setActive(true);
        $manager->persist($category);
        $this->addReference('equipment-category-sonorisation-foh', $category);

        $category = (new Category())
            ->setName('Équipement Plateau')
            ->setPosition(3)
            ->setActive(true);
        $manager->persist($category);
        $this->addReference('equipment-category-equipement-plateau', $category);

        $category = (new Category())
            ->setName('Mixage & Effets')
            ->setPosition(4)
            ->setActive(true);
        $manager->persist($category);
        $this->addReference('equipment-category-mixage-et-effets', $category);

        $category = (new Category())
            ->setName('Stands Microphone')
            ->setPosition(5)
            ->setActive(true);
        $manager->persist($category);
        $this->addReference('equipment-category-stands-microphone', $category);

        $category = (new Category())
            ->setName('Matériel informatique')
            ->setPosition(6)
            ->setActive(true);
        $manager->persist($category);
        $this->addReference('equipment-category-materiel-informatique', $category);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 7;
    }
}

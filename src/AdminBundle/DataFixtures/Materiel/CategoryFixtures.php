<?php

namespace App\AdminBundle\DataFixtures\Materiel;

use App\AdminBundle\Entity\Materiel\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $category = (new Category())
            ->setName('Sonorisation');
        $manager->persist($category);
        $this->addReference('category-sonorisation', $category);

        $category = (new Category())
            ->setName('Mixage');
        $manager->persist($category);
        $this->addReference('category-mixage', $category);

        $category = (new Category())
            ->setName('Microphone');
        $manager->persist($category);
        $this->addReference('category-microphone', $category);

        $category = (new Category())
            ->setName('Boîte de direct');
        $manager->persist($category);
        $this->addReference('category-di', $category);

        $category = (new Category())
            ->setName('Stand microphone');
        $manager->persist($category);
        $this->addReference('category-stand', $category);

        $category = (new Category())
            ->setName('Matériel informatique');
        $manager->persist($category);
        $this->addReference('category-informatique', $category);

        $category = (new Category())
            ->setName('Câbles');
        $manager->persist($category);
        $this->addReference('category-cables', $category);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 9;
    }
}

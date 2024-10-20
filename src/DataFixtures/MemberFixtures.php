<?php

namespace App\DataFixtures;

use App\Entity\Member;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class MemberFixtures extends Fixture implements OrderedFixtureInterface
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $member = new Member();
        $member->setEmail('rudy@bastardsoundsystem.org')
            ->setPassword($this->passwordHasher->hashPassword($member, '!bEb7RgDFJM?'))
            ->setRoles(['ROLE_MEMBER'])
            ->setName('Rudy Billiet')
            ->setType('adherent')
            ->setActive(true)
            ->setCountry('France')
            ->setStatus('Attente de cotisation');
        $manager->persist($member);
        $this->addReference('user-rudy-billiet', $member);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 2;
    }
}

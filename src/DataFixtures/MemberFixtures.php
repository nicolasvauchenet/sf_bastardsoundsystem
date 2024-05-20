<?php

namespace App\DataFixtures;

use App\Entity\Member\Member;
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
        $member->setEmail('member@bastardsoundsystem.org')
            ->setPassword($this->passwordHasher->hashPassword($member, 'member'))
            ->setRoles(['ROLE_MEMBER'])
            ->setFirstname('Adhérent')
            ->setLastname('BSS')
            ->setPseudo('adhérent')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setMemberType('Musicien')
            ->setActive(true);
        $manager->persist($member);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 4;
    }
}

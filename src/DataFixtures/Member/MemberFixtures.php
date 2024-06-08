<?php

namespace App\DataFixtures\Member;

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
        $member->setEmail('feelarsen.production@gmail.com')
            ->setPassword($this->passwordHasher->hashPassword($member, '!bEb7RgDFJM?'))
            ->setRoles(['ROLE_MEMBER'])
            ->setFirstname('Féelarsen')
            ->setPseudo('Jeff')
            ->setPhone('06 31 24 90 65')
            ->setZipcode('87000')
            ->setCity('Limoges')
            ->setCountry('France')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setMemberType('Groupe')
            ->setActive(true);
        $manager->persist($member);

        $member = new Member();
        $member->setEmail('member2@bastardsoundsystem.org')
            ->setPassword($this->passwordHasher->hashPassword($member, '!bEb7RgDFJM?'))
            ->setRoles(['ROLE_MEMBER'])
            ->setFirstname('Johnny')
            ->setLastname('Halliday')
            ->setPseudo('Johnny')
            ->setPhone('01 02 03 04 05')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setMemberType('Musicien')
            ->setActive(false)
            ->setArchivedAt(new \DateTimeImmutable())
            ->setArchivedCause('Décédé');
        $manager->persist($member);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 4;
    }
}

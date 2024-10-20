<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ArtistFixtures extends Fixture implements OrderedFixtureInterface
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $artist = new Artist();
        $artist->setEmail('feelarsen@bastardsoundsystem.org')
            ->setPassword($this->passwordHasher->hashPassword($artist, '!bEb7RgDFJM?'))
            ->setRoles(['ROLE_ARTIST'])
            ->setName('Féelarsen')
            ->setType('artist')
            ->setActive(true)
            ->setStatus('Attente de cotisation')
            ->setPhone('06 31 24 90 65')
            ->setZipcode('87000')
            ->setCity('Limoges')
            ->setCountry('France')
            ->setLogo('feelarsen-logo.jpg')
            ->setDescription("Féelarsen est un groupe de rock basé à Limoges, influencé par Noir Désir, Starshooter, et les Wampas. Leurs compositions originales et en français abordent des thèmes sombres et ironiques avec des paroles incisives et des riffs mordants.")
            ->setGenre('Rock alternatif')
            ->setWebsite('https://feelarsen.fr')
            ->setPhotoLive('feelarsen-live.jpg')
            ->setPhotoBand('feelarsen-band.jpg');
        $manager->persist($artist);
        $this->addReference('user-feelarsen', $artist);

        $artist = new Artist();
        $artist->setEmail('forevermadame@bastardsoundsystem.org')
            ->setPassword($this->passwordHasher->hashPassword($artist, '!bEb7RgDFJM?'))
            ->setRoles(['ROLE_ARTIST'])
            ->setName('Forever Madame')
            ->setType('artist')
            ->setActive(false)
            ->setStatus('Attente de cotisation')
            ->setZipcode('87000')
            ->setCity('Limoges')
            ->setCountry('France')
            ->setLogo('forever-madame-logo.png')
            ->setGenre('Rock progressif')
            ->setPhotoLive('forever-madame-live.jpg')
            ->setPhotoBand('forever-madame-band.jpg');
        $manager->persist($artist);
        $this->addReference('user-forever-madame', $artist);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 3;
    }
}

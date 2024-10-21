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
            ->setActive(true)
            ->setStatus('Attente de cotisation')
            ->setPhone('06 31 24 90 65')
            ->setZipcode('87000')
            ->setCity('Limoges')
            ->setCountry('France')
            ->setBandmates(3)
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
            ->setActive(true)
            ->setStatus('Attente de cotisation')
            ->setZipcode('87000')
            ->setCity('Limoges')
            ->setCountry('France')
            ->setBandmates(5)
            ->setLogo('forever-madame-logo.png')
            ->setGenre('Rock progressif')
            ->setPhotoLive('forever-madame-live.jpg')
            ->setPhotoBand('forever-madame-band.jpg');
        $manager->persist($artist);
        $this->addReference('user-forever-madame', $artist);

        $artist = new Artist();
        $artist->setEmail('truman@bastardsoundsystem.org')
            ->setPassword($this->passwordHasher->hashPassword($artist, '!bEb7RgDFJM?'))
            ->setRoles(['ROLE_ARTIST'])
            ->setName('Truman')
            ->setActive(true)
            ->setStatus('Attente de cotisation')
            ->setZipcode('87000')
            ->setCity('Limoges')
            ->setCountry('France')
            ->setBandmates(2)
            ->setLogo('truman-logo.png')
            ->setGenre('Rock poétique')
            ->setPhotoLive('truman-live.jpg')
            ->setPhotoBand('truman-band.jpg');
        $manager->persist($artist);
        $this->addReference('user-truman', $artist);

        $artist = new Artist();
        $artist->setEmail('zanaly@bastardsoundsystem.org')
            ->setPassword($this->passwordHasher->hashPassword($artist, '!bEb7RgDFJM?'))
            ->setRoles(['ROLE_ARTIST'])
            ->setName('Zanaly')
            ->setActive(true)
            ->setStatus('Attente de cotisation')
            ->setZipcode('23000')
            ->setCity('Guéret')
            ->setCountry('France')
            ->setBandmates(4)
            ->setLogo('zanaly-logo.png')
            ->setGenre('Métal progressif')
            ->setPhotoLive('zanaly-live.jpg')
            ->setPhotoBand('zanaly-band.jpg');
        $manager->persist($artist);
        $this->addReference('user-zanaly', $artist);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 3;
    }
}

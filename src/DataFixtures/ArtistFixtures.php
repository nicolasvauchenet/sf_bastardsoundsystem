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
            ->setDescription("<strong>La preuve vivante que le Rock français n'est pas mort !</strong><br/>Originaire de Limoges, Féelarsen est avant tout taillé pour la scène. Depuis maintenant trois ans, le groupe trace sa route en enchaînant les concerts dans les bars, les festivals et les salles de concerts, assurant des premières parties importantes comme <strong>les Ramoneurs de Menhirs</strong>, <strong>les Sales Majestés</strong>, <strong>Krav Boca</strong>. Leurs textes inspirés et mordants, accompagnés d'un son travaillé et fourni, donnent du corps à une critique assaisonnée de notre société. Des mélodies à la sauce piquante, une rythmique impeccable et des guitares acérées, où l'on frôle un esprit joyeusement bordélique…")
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
            ->setDescription("<strong>Un rock puissant et poétique&nbsp;!</strong><br/>C’est au début de l’année 2020 que Mathieu Cheype (Truman) et Benoît Fouillaud (Les Poors, BïïïZ), passionnés de guitare et de rock français, ont fondé Forever Madame. Rapidement, ils ont monté un répertoire de balades acoustiques teintées de rock. Avec l'arrivée de Nicolas Constanty (Ubris Deal, BïïïZ), claviériste aux influences seventies, le groupe a pris une nouvelle direction. Puis, les frères Loïc (batterie) et Ludovic Audonnet (basse) ont apporté groove et puissance, propulsant Forever Madame vers un rock plus affirmé, prêt à écrire son histoire.")
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
            ->setDescription("<strong>Sensibilité et puissance en harmonie&nbsp;!</strong><br/>Auteur, compositeur et interprète, Truman livre avec sensibilité et désinvolture un peu de lui et beaucoup de nous à travers ses compositions intimes et percutantes. Composé de Mathieu à la guitare acoustique et au chant, et de Clément à la guitare électrique, le duo propose un contraste musical captivant entre douceur et puissance. Leurs morceaux mêlent des mélodies sincères et des riffs électriques qui touchent autant qu'ils bousculent. Ensemble, ils créent un univers sonore riche, où les émotions se mêlent et se confrontent, offrant une expérience musicale authentique et poignante.")
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
            ->setDescription("<strong>Un métal progressif aux accents alternatifs&nbsp;!</strong><br/>Originaire de Creuse, Zanaly est une formation instrumentale qui explore les confins du métal progressif. Composé de quatre musiciens aux influences multiples, le groupe s'est forgé une réputation solide à travers des concerts immersifs et hypnotiques. Après plusieurs années à peaufiner leur son complexe et atmosphérique, ils s'apprêtent à sortir leur premier EP. Mélangeant des rythmiques envoûtantes, des solos vertigineux et des textures sonores audacieuses, Zanaly offre un voyage sonore intense et introspectif. Leur univers, à la fois lourd et éthéré, captive les amateurs de virtuosité musicale.")
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

<?php

namespace App\DataFixtures;

use App\Entity\Social;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SocialFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // BSS Socials
        $social = (new Social())
            ->setName('Facebook')
            ->setClass('facebook')
            ->setIcon('bi:facebook')
            ->setTitle('Suis-nous sur Facebook')
            ->setUrl('https://www.facebook.com/bastardsoundsystem/')
            ->setOwner($this->getReference('user-bss'))
            ->setActive(true);
        $manager->persist($social);

        $social = (new Social())
            ->setName('Bandcamp')
            ->setClass('bandcamp')
            ->setIcon('cib:bandcamp')
            ->setTitle('Suis-nous sur Bandcamp')
            ->setUrl('#')
            ->setOwner($this->getReference('user-bss'))
            ->setActive(false);
        $manager->persist($social);

        $social = (new Social())
            ->setName('DailyMotion')
            ->setClass('dailymotion')
            ->setIcon('fontisto:dailymotion')
            ->setTitle('Toutes nos vidéos sur DailyMotion')
            ->setUrl('https://www.dailymotion.com/dm_522f5a7bcf58b3f2db21128405')
            ->setOwner($this->getReference('user-bss'))
            ->setActive(true);
        $manager->persist($social);

        // Féelarsen member socials
        $social = (new Social())
            ->setName('Spotify')
            ->setClass('spotify')
            ->setIcon('bi:spotify')
            ->setTitle('Écoute Féelarsen sur Spotify')
            ->setUrl('https://open.spotify.com/intl-fr/artist/7dTRyO5JW320DZg7Y3hDrZ?si=CHVAM0PBSBq5Icsd2RhJWQ')
            ->setOwner($this->getReference('user-feelarsen'))
            ->setActive(true);
        $manager->persist($social);

        $social = (new Social())
            ->setName('Deezer')
            ->setClass('deezer')
            ->setIcon('arcticons:deezer')
            ->setTitle('Écoute Féelarsen sur Deezer')
            ->setUrl('https://deezer.page.link/adx4emNb4MgkwfNf6')
            ->setOwner($this->getReference('user-feelarsen'))
            ->setActive(true);
        $manager->persist($social);

        $social = (new Social())
            ->setName('Apple Music')
            ->setClass('apple-music')
            ->setIcon('cib:apple-music')
            ->setTitle('Écoute Féelarsen sur Apple Music')
            ->setUrl('https://music.apple.com/fr/artist/f%C3%A9elarsen/1610754643')
            ->setOwner($this->getReference('user-feelarsen'))
            ->setActive(true);
        $manager->persist($social);

        $social = (new Social())
            ->setName('Bandcamp')
            ->setClass('bandcamp')
            ->setIcon('cib:bandcamp')
            ->setTitle('Suis Féelarsen sur Bandcamp')
            ->setUrl('https://feelarsenproduction.bandcamp.com/album/willy')
            ->setOwner($this->getReference('user-feelarsen'))
            ->setActive(true);
        $manager->persist($social);

        $social = (new Social())
            ->setName('Facebook')
            ->setClass('facebook')
            ->setIcon('bi:facebook')
            ->setTitle('Suis Féelarsen sur Facebook')
            ->setUrl('https://www.facebook.com/LesFeelarsen')
            ->setOwner($this->getReference('user-feelarsen'))
            ->setActive(true);
        $manager->persist($social);

        // Forever Madame member socials
        $social = (new Social())
            ->setName('Spotify')
            ->setClass('spotify')
            ->setIcon('bi:spotify')
            ->setTitle('Écoute Forever Madame sur Spotify')
            ->setUrl('https://open.spotify.com/intl-fr/artist/6jDc27nbH2TMr7bUkXvU6q')
            ->setOwner($this->getReference('user-forever-madame'))
            ->setActive(true);
        $manager->persist($social);

        $social = (new Social())
            ->setName('Deezer')
            ->setClass('deezer')
            ->setIcon('arcticons:deezer')
            ->setTitle('Écoute Forever Madame sur Deezer')
            ->setUrl('https://www.deezer.com/fr/artist/161012942')
            ->setOwner($this->getReference('user-forever-madame'))
            ->setActive(true);
        $manager->persist($social);

        $social = (new Social())
            ->setName('Bandcamp')
            ->setClass('bandcamp')
            ->setIcon('cib:bandcamp')
            ->setTitle('Suis Forever Madame sur Bandcamp')
            ->setUrl('https://forevermadame.bandcamp.com/album/forever-madame')
            ->setOwner($this->getReference('user-forever-madame'))
            ->setActive(true);
        $manager->persist($social);

        $social = (new Social())
            ->setName('Facebook')
            ->setClass('facebook')
            ->setIcon('bi:facebook')
            ->setTitle('Suis Forever Madame sur Facebook')
            ->setUrl('https://www.facebook.com/forevermadame')
            ->setOwner($this->getReference('user-forever-madame'))
            ->setActive(true);
        $manager->persist($social);

        // Truman member socials
        $social = (new Social())
            ->setName('Spotify')
            ->setClass('spotify')
            ->setIcon('bi:spotify')
            ->setTitle('Écoute Truman sur Spotify')
            ->setUrl('https://open.spotify.com/intl-fr/artist/2t3nMqmeIIQACDM3wwvWbX')
            ->setOwner($this->getReference('user-truman'))
            ->setActive(true);
        $manager->persist($social);

        $social = (new Social())
            ->setName('Deezer')
            ->setClass('deezer')
            ->setIcon('arcticons:deezer')
            ->setTitle('Écoute Truman sur Deezer')
            ->setUrl('https://www.deezer.com/fr/artist/161012942')
            ->setOwner($this->getReference('user-truman'))
            ->setActive(false);
        $manager->persist($social);

        $social = (new Social())
            ->setName('Bandcamp')
            ->setClass('bandcamp')
            ->setIcon('cib:bandcamp')
            ->setTitle('Suis Truman sur Bandcamp')
            ->setUrl('https://forevermadame.bandcamp.com/album/forever-madame')
            ->setOwner($this->getReference('user-truman'))
            ->setActive(false);
        $manager->persist($social);

        $social = (new Social())
            ->setName('Facebook')
            ->setClass('facebook')
            ->setIcon('bi:facebook')
            ->setTitle('Suis Truman sur Facebook')
            ->setUrl('https://www.facebook.com/trumanmusique')
            ->setOwner($this->getReference('user-truman'))
            ->setActive(true);
        $manager->persist($social);

        // Zanaly member socials
        $social = (new Social())
            ->setName('Facebook')
            ->setClass('facebook')
            ->setIcon('bi:facebook')
            ->setTitle('Suis Zanaly sur Facebook')
            ->setUrl('https://www.facebook.com/profile.php?id=100027589639626')
            ->setOwner($this->getReference('user-zanaly'))
            ->setActive(true);
        $manager->persist($social);

        // Laeti D. Photos partner socials
        $social = (new Social())
            ->setName('Instagram')
            ->setClass('instagram')
            ->setIcon('ri:instagram-fill')
            ->setTitle('Suis Laeti D. Photos sur Instagram')
            ->setUrl('https://www.instagram.com/laeti.d.photos')
            ->setOwner($this->getReference('user-laeti-d-photos'))
            ->setActive(true);
        $manager->persist($social);

        $social = (new Social())
            ->setName('Facebook')
            ->setClass('facebook')
            ->setIcon('bi:facebook')
            ->setTitle('Suis Laeti D. Photos sur Facebook')
            ->setUrl('https://www.facebook.com/bastardsoundsystem/')
            ->setOwner($this->getReference('user-laeti-d-photos'))
            ->setActive(true);
        $manager->persist($social);

        // Imaginaerum Studio partner socials
        $social = (new Social())
            ->setName('Facebook')
            ->setClass('facebook')
            ->setIcon('bi:facebook')
            ->setTitle('Suis Imaginaerum Studio sur Facebook')
            ->setUrl('https://www.facebook.com/profile.php?id=61559558665660')
            ->setOwner($this->getReference('user-imaginaerum-studio'))
            ->setActive(true);
        $manager->persist($social);

        // ShadoWorkProd partner socials
        $social = (new Social())
            ->setName('YouTube')
            ->setClass('youtube')
            ->setIcon('bi:youtube')
            ->setTitle('Toutes les vidéos de ShadoWorkProd sur YouTube')
            ->setUrl('https://www.youtube.com/@Shadoworkprod/featured')
            ->setOwner($this->getReference('user-shadoworkprod'))
            ->setActive(true);
        $manager->persist($social);

        $social = (new Social())
            ->setName('Instagram')
            ->setClass('instagram')
            ->setIcon('ri:instagram-fill')
            ->setTitle('Suis ShadoWorkProd sur Instagram')
            ->setUrl('https://www.instagram.com/shadoworkprod?igsh=MTViZDZrYXp4djlqaA%3D%3D')
            ->setOwner($this->getReference('user-shadoworkprod'))
            ->setActive(true);
        $manager->persist($social);

        $social = (new Social())
            ->setName('Facebook')
            ->setClass('facebook')
            ->setIcon('bi:facebook')
            ->setTitle('Suis ShadoWorkProd sur Facebook')
            ->setUrl('https://www.facebook.com/profile.php?id=100089419065947')
            ->setOwner($this->getReference('user-shadoworkprod'))
            ->setActive(true);
        $manager->persist($social);

        // Philae Studio partner socials
        $social = (new Social())
            ->setName('YouTube')
            ->setClass('youtube')
            ->setIcon('bi:youtube')
            ->setTitle('Toutes les vidéos de Philae Studio sur YouTube')
            ->setUrl('https://www.youtube.com/@PhilaeStudio')
            ->setOwner($this->getReference('user-philae-studio'))
            ->setActive(true);
        $manager->persist($social);

        $social = (new Social())
            ->setName('Facebook')
            ->setClass('facebook')
            ->setIcon('bi:facebook')
            ->setTitle('Suis Philae Studio sur Facebook')
            ->setUrl('https://www.facebook.com/philaestudio')
            ->setOwner($this->getReference('user-philae-studio'))
            ->setActive(true);
        $manager->persist($social);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 5;
    }
}

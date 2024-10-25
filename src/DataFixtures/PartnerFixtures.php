<?php

namespace App\DataFixtures;

use App\Entity\Partner;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class PartnerFixtures extends Fixture implements OrderedFixtureInterface
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $partner = new Partner();
        $partner->setEmail('laetid@bastardsoundsystem.org')
            ->setPassword($this->passwordHasher->hashPassword($partner, '!bEb7RgDFJM?'))
            ->setRoles(['ROLE_PARTNER'])
            ->setName('Laeti D. Photos')
            ->setActive(true)
            ->setStatus('Actif')
            ->setType('Photo')
            ->setSpecialties('Live')
            ->setLogo('laeti-d-photos-logo.png')
            ->setDescription("Passionnée par la musique et la photographie, Laëtitia suit les groupes partout, capturant l’énergie brute des scènes et l’intensité des moments live. Toujours présente en tournée, elle immortalise chaque instant, des coulisses aux montées d’adrénaline sur scène. Photographe amateur, elle possède une solide expérience et un œil affûté pour saisir l’essence des performances. Cool et décontractée, elle se fond dans l’ambiance des concerts pour restituer des clichés authentiques, vibrants, et profondément connectés à l’univers des artistes qu’elle accompagne.")
            ->setCity('Limoges')
            ->setZipcode('87000');
        $manager->persist($partner);
        $this->addReference('user-laeti-d-photos', $partner);

        $partner = new Partner();
        $partner->setEmail('cedriccarre@bastardsoundsystem.org')
            ->setPassword($this->passwordHasher->hashPassword($partner, '!bEb7RgDFJM?'))
            ->setRoles(['ROLE_PARTNER'])
            ->setName('Cédric Carré')
            ->setActive(true)
            ->setStatus('Actif')
            ->setType('Photo')
            ->setSpecialties('Live')
            ->setLogo('cedric-carre-logo.png')
            ->setDescription("Photographe, illustrateur et designer basé en Charente-Maritime, ce créatif allie sourire et perfectionnisme dans chacun de ses projets. Toujours cool et accessible, il s’attache à saisir l’instant parfait, que ce soit à travers la lentille de son appareil photo ou en travaillant des illustrations et des designs uniques. Inspiré par son environnement côtier, il crée des visuels qui marient technique impeccable et sens artistique aiguisé. Soucieux du moindre détail, il travaille chaque image et chaque projet avec passion, pour offrir des résultats à la fois percutants et raffinés.")
            ->setCity('Cozes')
            ->setZipcode('17120');
        $manager->persist($partner);
        $this->addReference('user-cedric-carre', $partner);

        $partner = new Partner();
        $partner->setEmail('shadowork.contact@gmail.com')
            ->setPassword($this->passwordHasher->hashPassword($partner, '!bEb7RgDFJM?'))
            ->setRoles(['ROLE_PARTNER'])
            ->setName('ShadoWorkProd')
            ->setActive(true)
            ->setStatus('Actif')
            ->setType('Vidéo')
            ->setSpecialties('Live, Clips')
            ->setDescription("ShadoWorkProd est une association audiovisuelle spécialisée dans la réalisation de clips vidéo et la captation de concerts. Discrets mais efficaces, nous œuvrons en coulisses pour sublimer vos projets et les mettre sous les feux des projecteurs. Que ce soit pour capturer l'énergie brute d'une performance live ou pour concevoir des clips créatifs et percutants, nous mettons notre savoir-faire et notre passion au service de vos idées. Avec ShadoWorkProd, votre univers artistique trouve l’écrin visuel qu’il mérite, toujours avec une touche d'authenticité&nbsp;!")
            ->setLogo('shadoworkprod-logo.png')
            ->setCity('Cressat')
            ->setZipcode('23140');
        $manager->persist($partner);
        $this->addReference('user-shadoworkprod', $partner);

        $partner = new Partner();
        $partner->setEmail('imaginaerumstudio@bastardsoundsystem.org')
            ->setPassword($this->passwordHasher->hashPassword($partner, '!bEb7RgDFJM?'))
            ->setRoles(['ROLE_PARTNER'])
            ->setName('Imaginaerum Studio')
            ->setActive(true)
            ->setStatus('Actif')
            ->setType('Vidéo')
            ->setSpecialties('Live, Clips')
            ->setLogo('imaginaerum-studio-logo.jpg')
            ->setDescription("Imaginaerum Studio est une association dédiée à la production de contenu audiovisuel. En plus de cette mission, nous avons pour projet de créer un espace collaboratif dédié à la création audiovisuelle associative. Ce projet commence par l'ouverture d'un studio photo et vidéo à Aubusson, et s'étendra à terme en un complexe regroupant studios de tournage, résidences, ateliers de fabrication et bien plus. Nous souhaitons offrir aux créateurs un lieu où partager ressources, compétences et créativité pour donner vie à leurs projets dans un cadre inspirant et collaboratif.")
            ->setCity('Aubusson')
            ->setZipcode('23200');
        $manager->persist($partner);
        $this->addReference('user-imaginaerum-studio', $partner);

        $partner = new Partner();
        $partner->setEmail('philaestudio@bastardsoundsystem.org')
            ->setPassword($this->passwordHasher->hashPassword($partner, '!bEb7RgDFJM?'))
            ->setRoles(['ROLE_PARTNER'])
            ->setName('Philae Studio')
            ->setActive(false)
            ->setStatus('Attente de proposition')
            ->setType('Studio')
            ->setSpecialties('Enregistrement, Mixage')
            ->setLogo('philae-studio-logo.jpg')
            ->setDescription("Studio d'enregistrement | Mixage | Production musicale")
            ->setCity('Limoges')
            ->setZipcode('87000');
        $manager->persist($partner);
        $this->addReference('user-philae-studio', $partner);

        $partner = new Partner();
        $partner->setEmail('tweedstudio@bastardsoundsystem.org')
            ->setPassword($this->passwordHasher->hashPassword($partner, '!bEb7RgDFJM?'))
            ->setRoles(['ROLE_PARTNER'])
            ->setName('Tweed Studio')
            ->setActive(false)
            ->setStatus('Attente de proposition')
            ->setType('Studio')
            ->setSpecialties('Enregistrement, Mixage, Mastering')
            ->setLogo('tweed-studio-logo.webp')
            ->setDescription("Studio d'enregistrement et de mastering")
            ->setCity('Montluçon')
            ->setZipcode('03100');
        $manager->persist($partner);
        $this->addReference('user-tweed-studio', $partner);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 4;
    }
}

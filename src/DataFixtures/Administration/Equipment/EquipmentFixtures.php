<?php

namespace App\DataFixtures\Administration\Equipment;

use App\Entity\BackOffice\Administration\Equipment\Equipment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EquipmentFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $equipment = (new Equipment())
            ->setCategory($this->getReference('category-materiel-informatique'))
            ->setName('TRANSCEND StoreJet 25H3B 4To')
            ->setImage('transcend-storejet-25h3B-4To.png')
            ->setDescription("Ce disque dur est connu pour sa robustesse et sa grande capacité de stockage, le rendant idéal pour stocker des photos, vidéos, et documents de grande taille. Caractéristiques principales : Capacité de stockage : 4 To, Interface : USB 3.1 Gen 1 (rétrocompatible avec USB 2.0), Protection contre les chocs : Trois niveaux de protection, conforme aux normes de test de chute militaire MIL-STD-810G, Dimensions : 131.8 mm x 80.8 mm x 24.5 mm, Poids : 298 g. Système de sauvegarde : Bouton de sauvegarde automatique \"One Touch\" nécessitant le logiciel Transcend Elite. Couleur : Bleu marine. Ce disque dur est conçu pour offrir une protection maximale grâce à son boîtier en silicone, un amortisseur interne et une coque renforcée. Il est également équipé de la technologie USB 3.1 Gen 1 pour des vitesses de transfert élevées, jusqu'à 5 Gb/s. Il est compatible avec Windows, macOS et Linux, et comprend un logiciel de gestion des données avancé, Transcend Elite, pour des fonctions de sauvegarde, de cryptage et de récupération des données.")
            ->setPurchasePrice(148.38)
            ->setArgusPrice(90)
            ->setPurchasedAt(new \DateTimeImmutable('2023-09-25'))
            ->setInvoice('transcend-storejet-25h3B-4To.pdf')
            ->setStatus('OK')
            ->setActive(true);
        $manager->persist($equipment);

        $equipment = (new Equipment())
            ->setCategory($this->getReference('category-microphones'))
            ->setName('ADK A51-S')
            ->setImage('adk-a51-s.png')
            ->setDescription("Microphone à condensateur à large membrane conçu pour capturer des voix et des instruments avec une grande précision. Le ADK A51-S est apprécié pour sa réponse en fréquence lisse et musicale, offrant une reproduction sonore de haute qualité pour divers usages en studio, notamment pour les voix, les guitares acoustiques et les instruments à cordes. Il est doté d'un filtre passe-haut et d'un atténuateur de -10dB, le rendant polyvalent pour des sources sonores à haute pression.")
            ->setPurchasePrice(200)
            ->setArgusPrice(100)
            ->setPurchasedAt(new \DateTimeImmutable('2006-10-09'))
            ->setStatus('OK')
            ->setActive(true);
        $manager->persist($equipment);

        $equipment = (new Equipment())
            ->setCategory($this->getReference('category-microphones'))
            ->setName('ADK A51-S')
            ->setImage('adk-a51-s-1.png')
            ->setDescription("Microphone à condensateur à large membrane conçu pour capturer des voix et des instruments avec une grande précision. Le ADK A51-S est apprécié pour sa réponse en fréquence lisse et musicale, offrant une reproduction sonore de haute qualité pour divers usages en studio, notamment pour les voix, les guitares acoustiques et les instruments à cordes. Il est doté d'un filtre passe-haut et d'un atténuateur de -10dB, le rendant polyvalent pour des sources sonores à haute pression.")
            ->setPurchasePrice(200)
            ->setArgusPrice(100)
            ->setPurchasedAt(new \DateTimeImmutable('2006-10-09'))
            ->setStatus('OK')
            ->setActive(true);
        $manager->persist($equipment);

        $equipment = (new Equipment())
            ->setCategory($this->getReference('category-microphones'))
            ->setName('BEHRINGER C-1')
            ->setImage('behringer-c-1.png')
            ->setDescription("Microphone à condensateur à diaphragme moyen idéal pour les enregistrements en studio et les applications en direct. Le Behringer C-1 est apprécié pour son excellent rapport qualité-prix, offrant une réponse en fréquence de 40 Hz à 20 kHz et une entrée FET sans transformateur pour un bruit ultra-faible. Il dispose d'un motif polaire cardioïde pour une séparation optimale des sources sonores et une réduction du feedback.")
            ->setPurchasePrice(45)
            ->setArgusPrice(20)
            ->setPurchasedAt(new \DateTimeImmutable('2006-10-09'))
            ->setStatus('OK')
            ->setActive(true);
        $manager->persist($equipment);

        $equipment = (new Equipment())
            ->setCategory($this->getReference('category-microphones'))
            ->setName('SENNHEISER e609')
            ->setImage('sennheiser-e609.png')
            ->setDescription("Microphone dynamique supercardioïde conçu spécifiquement pour capturer le son des amplis de guitare, mais aussi adapté pour les instruments de percussion et les cuivres. Le Sennheiser e609 se distingue par sa capacité à être positionné très près de la source sonore, offrant ainsi un son direct et une excellente isolation. Il est souvent utilisé en studio et pour des performances en direct grâce à sa construction robuste et durable. Avec une réponse en fréquence de 40 Hz à 15 kHz et une sensibilité de 1,5 mV/Pa, il capture les détails sonores avec précision.")
            ->setPurchasePrice(92)
            ->setArgusPrice(65)
            ->setPurchasedAt(new \DateTimeImmutable('2023-10-01'))
            ->setInvoice('sennheiser-e609.pdf')
            ->setStatus('OK')
            ->setActive(true);
        $manager->persist($equipment);

        $equipment = (new Equipment())
            ->setCategory($this->getReference('category-microphones'))
            ->setName('SENNHEISER e609')
            ->setImage('sennheiser-e609-1.png')
            ->setDescription("Microphone dynamique supercardioïde conçu spécifiquement pour capturer le son des amplis de guitare, mais aussi adapté pour les instruments de percussion et les cuivres. Le Sennheiser e609 se distingue par sa capacité à être positionné très près de la source sonore, offrant ainsi un son direct et une excellente isolation. Il est souvent utilisé en studio et pour des performances en direct grâce à sa construction robuste et durable. Avec une réponse en fréquence de 40 Hz à 15 kHz et une sensibilité de 1,5 mV/Pa, il capture les détails sonores avec précision.")
            ->setPurchasePrice(92)
            ->setArgusPrice(65)
            ->setPurchasedAt(new \DateTimeImmutable('2023-10-01'))
            ->setInvoice('sennheiser-e609-1.pdf')
            ->setStatus('OK')
            ->setActive(true);
        $manager->persist($equipment);

        $equipment = (new Equipment())
            ->setCategory($this->getReference('category-microphones'))
            ->setName('SHURE Beta52')
            ->setImage('shure-beta52.png')
            ->setDescription("Microphone dynamique supercardioïde spécialement conçu pour capturer les sons des grosses caisses et autres instruments à basse fréquence. Le Shure Beta 52A est reconnu pour son excellente capacité à gérer des niveaux de pression sonore très élevés tout en fournissant un son de qualité studio avec un punch et une attaque exceptionnels. Il dispose d'une réponse en fréquence spécialement adaptée pour les basses, allant de 20 Hz à 10 kHz, et d'un adaptateur de pied intégré avec un connecteur XLR pour une installation facile, notamment à l'intérieur des grosses caisses. Ce microphone est également doté d'une grille en acier durci pour une durabilité accrue et d'un système de suspension pneumatique avancé pour minimiser la transmission du bruit mécanique et des vibrations.")
            ->setPurchasePrice(185)
            ->setArgusPrice(105.88)
            ->setPurchasedAt(new \DateTimeImmutable('2023-10-01'))
            ->setInvoice('facture-4343385.pdf')
            ->setStatus('OK')
            ->setActive(true);
        $manager->persist($equipment);

        $equipment = (new Equipment())
            ->setCategory($this->getReference('category-microphones'))
            ->setName('SHURE BG1.0')
            ->setImage('shure-bg1-0.png')
            ->setDescription("Microphone dynamique cardioïde idéal pour une variété d'applications de sonorisation et d'enregistrement de base. Le Shure BG 1.0 est conçu pour offrir une réponse en fréquence lisse et une isolation efficace des sons indésirables grâce à son motif polaire cardioïde. Il est robuste, avec une construction résistante aux chocs et une grille en acier anti-dent. Ses applications typiques incluent la prise de son d'instruments, les discours publics, et le karaoké. Ce microphone offre une excellente qualité pour son prix, en particulier pour les débutants ou comme premier microphone.")
            ->setPurchasePrice(30)
            ->setArgusPrice(17)
            ->setPurchasedAt(new \DateTimeImmutable('2006-10-09'))
            ->setStatus('OK')
            ->setActive(true);
        $manager->persist($equipment);

        $equipment = (new Equipment())
            ->setCategory($this->getReference('category-microphones'))
            ->setName('SHURE MX202')
            ->setImage('shure-mx202.png')
            ->setDescription("Microphone à condensateur suspendu de la série Microflex, conçu pour offrir un son clair et précis avec des cartouches interchangeables. Le Shure MX202 est disponible en noir ou blanc et peut être utilisé avec des cartouches cardioïdes, supercardioïdes ou mini-shotgun, offrant ainsi une flexibilité optimale pour diverses applications, telles que la prise de son pour les chorales, l'apprentissage à distance, et les environnements de scène et de théâtre. Il est équipé d'un préamplificateur en ligne et d'un col de cygne flexible de quatre pouces, ce qui permet un positionnement précis et stable.")
            ->setPurchasePrice(200)
            ->setArgusPrice(100)
            ->setPurchasedAt(new \DateTimeImmutable('2006-10-09'))
            ->setStatus('OK')
            ->setActive(true);
        $manager->persist($equipment);

        $equipment = (new Equipment())
            ->setCategory($this->getReference('category-microphones'))
            ->setName('SHURE SM57')
            ->setImage('shure-sm57.png')
            ->setDescription("Microphone dynamique cardioïde très prisé pour les enregistrements en studio et les performances en direct. Le Shure SM57 est renommé pour sa robustesse et sa capacité à gérer des niveaux de pression sonore élevés, ce qui le rend idéal pour les instruments tels que les percussions, les amplificateurs de guitare et les cuivres. Il est également utilisé pour les discours présidentiels aux États-Unis depuis 1965. Le SM57 offre une reproduction sonore claire et précise, avec une atténuation efficace du bruit de manipulation grâce à son système de montage pneumatique. C'est un choix polyvalent, utilisé aussi bien pour les voix que pour les instruments, en studio et sur scène.")
            ->setPurchasePrice(105)
            ->setArgusPrice(76.19)
            ->setPurchasedAt(new \DateTimeImmutable('2022-06-29'))
            ->setInvoice('shure-sm57.pdf')
            ->setStatus('OK')
            ->setActive(true);
        $manager->persist($equipment);

        $equipment = (new Equipment())
            ->setCategory($this->getReference('category-microphones'))
            ->setName('SHURE SM57')
            ->setImage('shure-sm57-1.png')
            ->setDescription("Microphone dynamique cardioïde très prisé pour les enregistrements en studio et les performances en direct. Le Shure SM57 est renommé pour sa robustesse et sa capacité à gérer des niveaux de pression sonore élevés, ce qui le rend idéal pour les instruments tels que les percussions, les amplificateurs de guitare et les cuivres. Il est également utilisé pour les discours présidentiels aux États-Unis depuis 1965. Le SM57 offre une reproduction sonore claire et précise, avec une atténuation efficace du bruit de manipulation grâce à son système de montage pneumatique. C'est un choix polyvalent, utilisé aussi bien pour les voix que pour les instruments, en studio et sur scène.")
            ->setPurchasePrice(105)
            ->setArgusPrice(76.19)
            ->setPurchasedAt(new \DateTimeImmutable('2022-06-29'))
            ->setInvoice('shure-sm57-1.pdf')
            ->setStatus('OK')
            ->setActive(true);
        $manager->persist($equipment);

        $equipment = (new Equipment())
            ->setCategory($this->getReference('category-microphones'))
            ->setName('SHURE SM58')
            ->setImage('shure-sm58.png')
            ->setDescription("Microphone dynamique cardioïde réputé pour les performances vocales sur scène et en studio. Le Shure SM58 est célèbre pour sa robustesse, sa capacité à gérer les niveaux de pression sonore élevés et sa réponse en fréquence spécialement adaptée aux voix (50 Hz à 15 000 Hz). Il est équipé d'un filtre anti-pop intégré pour minimiser les bruits de souffle et de vent, ainsi qu'un support anti-choc pneumatique pour réduire le bruit de manipulation. Ce microphone est souvent utilisé par des chanteurs, des animateurs, et même pour des discours présidentiels en raison de sa qualité et de sa durabilité légendaire.")
            ->setPurchasePrice(109)
            ->setArgusPrice(74.50)
            ->setPurchasedAt(new \DateTimeImmutable('2023-08-17'))
            ->setInvoice('shure-sm58.pdf')
            ->setStatus('OK')
            ->setActive(true);
        $manager->persist($equipment);

        $equipment = (new Equipment())
            ->setCategory($this->getReference('category-microphones'))
            ->setName('SHURE SM58')
            ->setImage('shure-sm58-1.png')
            ->setDescription("Microphone dynamique cardioïde réputé pour les performances vocales sur scène et en studio. Le Shure SM58 est célèbre pour sa robustesse, sa capacité à gérer les niveaux de pression sonore élevés et sa réponse en fréquence spécialement adaptée aux voix (50 Hz à 15 000 Hz). Il est équipé d'un filtre anti-pop intégré pour minimiser les bruits de souffle et de vent, ainsi qu'un support anti-choc pneumatique pour réduire le bruit de manipulation. Ce microphone est souvent utilisé par des chanteurs, des animateurs, et même pour des discours présidentiels en raison de sa qualité et de sa durabilité légendaire.")
            ->setPurchasePrice(109)
            ->setArgusPrice(74.50)
            ->setPurchasedAt(new \DateTimeImmutable('2023-08-17'))
            ->setInvoice('shure-sm58-1.pdf')
            ->setStatus('OK')
            ->setActive(true);
        $manager->persist($equipment);

        $equipment = (new Equipment())
            ->setCategory($this->getReference('category-mixage-et-effets'))
            ->setName('ALLEN & HEATH QU-16 Chrome Edition')
            ->setImage('allen-and-heath-qu-16-chrome-edition.png')
            ->setDescription("Console de mixage numérique à 16 canaux avec des boutons et des faders en chrome pour une meilleure visibilité dans des conditions de faible luminosité. Cette console est dotée de préamplis micro AnalogiQ™, d'un enregistreur USB intégré pour l'enregistrement multicanal, et de faders motorisés. Elle est idéale pour des applications en live, en studio, ou pour des installations fixes, offrant une grande flexibilité et des fonctionnalités avancées telles que le mixage automatique de microphones et un affichage spectrogramme.")
            ->setPurchasePrice(3168)
            ->setArgusPrice(1400)
            ->setPurchasedAt(new \DateTimeImmutable('2023-03-31'))
            ->setInvoice('allen-and-heath-qu-16-chrome-edition.pdf')
            ->setStatus('OK')
            ->setActive(true);
        $manager->persist($equipment);

        $equipment = (new Equipment())
            ->setCategory($this->getReference('category-sonorisation-foh'))
            ->setName('ALTO TSSUB18')
            ->setImage('alto-tssub-18.png')
            ->setDescription("Subwoofer actif de 18 pouces avec une puissance de 1200 watts. Il est conçu pour les systèmes de sonorisation professionnels, offrant des basses profondes et puissantes grâce à son amplificateur de classe D et son haut-parleur à longue excursion. Ce subwoofer est parfait pour renforcer les basses dans les configurations de sonorisation live, avec des entrées XLR stéréo et une sortie pour le chaînage en série d'autres haut-parleurs. Sa construction robuste en contreplaqué de bouleau de 18 mm le rend durable pour une utilisation sur scène.")
            ->setPurchasePrice(150)
            ->setArgusPrice(250)
            ->setPurchasedAt(new \DateTimeImmutable('2022-08-16'))
            ->setStatus('OK')
            ->setActive(true);
        $manager->persist($equipment);

        $equipment = (new Equipment())
            ->setCategory($this->getReference('category-sonorisation-foh'))
            ->setName('ALTO TSSUB18')
            ->setImage('alto-tssub-18-1.png')
            ->setDescription("Subwoofer actif de 18 pouces avec une puissance de 1200 watts. Il est conçu pour les systèmes de sonorisation professionnels, offrant des basses profondes et puissantes grâce à son amplificateur de classe D et son haut-parleur à longue excursion. Ce subwoofer est parfait pour renforcer les basses dans les configurations de sonorisation live, avec des entrées XLR stéréo et une sortie pour le chaînage en série d'autres haut-parleurs. Sa construction robuste en contreplaqué de bouleau de 18 mm le rend durable pour une utilisation sur scène.")
            ->setPurchasePrice(150)
            ->setArgusPrice(250)
            ->setPurchasedAt(new \DateTimeImmutable('2022-08-16'))
            ->setStatus('OK')
            ->setActive(true);
        $manager->persist($equipment);

        $equipment = (new Equipment())
            ->setCategory($this->getReference('category-sonorisation-foh'))
            ->setName('ELOKANCE ELO 1500')
            ->setImage('elokance-elo-1500.png')
            ->setDescription("Système de sonorisation amplifié quadriphonique de haute qualité, comprenant deux enceintes ELO 12 MK2 et deux subwoofers ELO SUB15A MK2. Ce système offre une puissance totale de 1500W RMS et est équipé d'un DSP intégré pour optimiser le son en fonction de l'utilisation. Les enceintes et subwoofers sont conçus pour une robustesse maximale avec des finitions en peinture granitée et des grilles de protection.")
            ->setPurchasePrice(800)
            ->setArgusPrice(850)
            ->setPurchasedAt(new \DateTimeImmutable('2022-08-16'))
            ->setUpdatedAt(new \DateTimeImmutable('2024-04-23'))
            ->setStatus('KO')
            ->setActive(false);
        $manager->persist($equipment);

        $equipment = (new Equipment())
            ->setCategory($this->getReference('category-stands-microphone'))
            ->setName('K&M 25900 STAND')
            ->setImage('k-m-25900-stand.png')
            ->setDescription("Petit pied perche de micro pour ampli de guitare, grosse caisse, etc. Hauteur réglable de 425 à 645 mm, perche extensible de 470 à 775 mm. Poids: 2,2 g")
            ->setPurchasePrice(69)
            ->setArgusPrice(40)
            ->setPurchasedAt(new \DateTimeImmutable('2023/10/01'))
            ->setInvoice('k-m-25900-stand.pdf')
            ->setStatus('OK')
            ->setActive(false);
        $manager->persist($equipment);

        $equipment = (new Equipment())
            ->setCategory($this->getReference('category-mixage-et-effets'))
            ->setName('DBX 1231')
            ->setImage('dbx-1231.png')
            ->setDescription("Égaliseur graphique double canal à 31 bandes, conçu pour les environnements de renforcement sonore exigeants. Le DBX 1231 offre des fonctionnalités standard telles que : deux canaux indépendants, 31 bandes par canal, espacées par tiers d'octave, plages de gain commutables entre ±6 dB et ±15 dB, connecteurs XLR, TRS 1/4\", et strip de bornes pour une installation facile, entrées/sorties équilibrées et non équilibrées, filtrées RF, réponse en fréquence : 10 Hz à 50 kHz, SNR : Plus de 90 dB, distorsion harmonique totale : Moins de 0,005% à 1 kHz, châssis 3U en acier/aluminium, transformateur isolé magnétiquement, bypass relais à fil dur avec délai de mise sous tension de 2 secondes, filtre coupe-bas à 40 Hz, et possibilité de levée de la masse du châssis/signal pour une isolation rapide des ronflements. Ce modèle est idéal pour les installations fixes comme pour les configurations portables ou de tournée, offrant une flexibilité et une robustesse nécessaires pour les applications professionnelles de sonorisation.")
            ->setPurchasePrice(444)
            ->setArgusPrice(124.08)
            ->setPurchasedAt(new \DateTimeImmutable('2006-10-09'))
            ->setStatus('OK')
            ->setActive(true);
        $manager->persist($equipment);

        $equipment = (new Equipment())
            ->setCategory($this->getReference('category-sonorisation-plateau'))
            ->setName('THE SSSNAKE MC164')
            ->setImage('the-sssnake-mc164.png')
            ->setDescription("Multipaire 16/4, avec 16 connecteurs XLR femelles et 4 connecteurs XLR mâles, idéal pour les applications de scène et de studio. Le MC164 est long de 30 mètres et est connu pour sa robustesse et sa flexibilité. Il est équipé d'une boîte de scène compacte mesurant 33,5 x 18 x 7 cm et d'un diamètre de câble de 15 mm. Ce câble est particulièrement apprécié pour sa capacité à gérer plusieurs connexions XLR de manière efficace, bien que certains utilisateurs aient noté des problèmes de marquage et de fragilité des connecteurs après une utilisation intensive.")
            ->setPurchasePrice(161)
            ->setArgusPrice(80.27)
            ->setPurchasedAt(new \DateTimeImmutable('2022-08-16'))
            ->setStatus('OK')
            ->setActive(true);
        $manager->persist($equipment);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 7;
    }
}

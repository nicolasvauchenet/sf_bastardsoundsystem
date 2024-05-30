<?php

namespace App\DataFixtures;

use App\Entity\Service\Service;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ServiceFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $service = (new Service())
            ->setCategory('Technique')
            ->setName('Sonorisation')
            ->setTitle('Quand les murs tremblent et même les mouches se taisent')
            ->setDescription("Accroche-toi bien, car on va secouer les murs et chatouiller les tympans de ton public&nbsp;! On sait comment balancer le son pour tes spectacles et tes lives, en s'assurant que chaque note et chaque foutu mot soient entendus avec une clarté à tous leur coller la chair de poule. Que ce soit dans une cave enfumée ou dans un stade plein à craquer, notre matos dernier cri et notre expertise technique garantissent que ta musique soit toujours au-dessus du bordel ambiant. On crée une méga ambiance où chaque vibration fait vibrer la foule comme jamais. Avec nous aux manettes du son, prépare-toi à voir ton public se lever, écouter et ressentir chaque satané moment comme si c'était la première fois. On ne se contente pas de sonoriser ton show&nbsp;;&nbsp;on le transcende pour en faire une expérience légendaire&nbsp;!")
            ->setCover('sonorisation.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory('Technique')
            ->setName('Plateau')
            ->setTitle("J'ai vu des p'tits bonshommes en noir&nbsp;!")
            ->setDescription("On prend en charge tous les aspects de la scène et du plateau pour que tes performances soient inoubliables. On gère la conception et la configuration de l'espace scénique, en veillant à ce que chaque élément, des décors aux installations techniques, soit parfaitement intégré et fonctionnel. Notre expertise couvre également la logistique du plateau, assurant que tout le matériel nécessaire est prêt et à portée de main pour chaque moment du spectacle. Que ce soit pour un concert, un événement en direct ou un tournage de clip, nous créons un environnement de performance qui non seulement répond à tes besoins artistiques mais qui renforce aussi l'impact de ta présence sur scène.")
            ->setCover('plateau.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory('Technique')
            ->setName('Dossier Technique')
            ->setTitle('Ça peut servir pour préparer votre scène…')
            ->setDescription("Tu veux que chaque concert soit une explosion de décibels et de lumières, orchestré à la perfection sans accrocs&nbsp;? Nous prenons tout en main, des fiches techniques aux riders, en passant par les plans de scène et les patch lists, assurant que chaque détail soit précisément adapté à tes besoins de rockstar. Nos documents détaillent l'emplacement exact de chaque élément et garantissent une harmonie maximale pour tes performances. Avec une précision chirurgicale, nous nous assurons que chaque connexion soit optimale et intuitive, permettant à tes techniciens de faciliter la transition entre les parties de ton show. Prépare-toi à déchaîner ton énergie rock'n roll sur scène avec une organisation sans faille qui laissera ton public ébahi et conquis. Alors, prêt à enflammer les scènes et à faire trembler les murs et les tympans&nbsp;? Laisse-nous aider à rendre chaque concert une expérience mémorable&nbsp;!")
            ->setCover('dossier-technique.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory('Management')
            ->setName('Logos')
            ->setTitle('Laissez votre griffe&nbsp;!')
            ->setDescription("T'es prêt à déchirer et laisser ta trace dans l'histoire du rock&nbsp;? On se contente pas de balancer des logos plan-plan&nbsp;;&nbsp;on découpe dans le gras pour créer des symboles qui fracassent. Avec une créativité qui déborde et un flair artistique plus tranchant qu'une lame de rasoir, on bosse avec toi pour sculpter un logo qui respire l'essence de ta troupe. Que tu veuilles capter la rage du punk rock, la puissance brute du métal, ou l'âme envoûtante du blues, on est là pour transformer ton style et ta passion en un putain de symbole visuel qui déboîte. Un logo qui déchire pas seulement visuellement, mais qui te prend aux tripes, un cri de guerre pour tes fans et un étendard sous lequel foutre le feu. Rejoins-nous, et ensemble, on va créer le logo qui fera de ta bande une putain de légende&nbsp;!")
            ->setCover('logos.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory('Management')
            ->setName('Covers')
            ->setTitle("Des visuels qui s'incrustent")
            ->setDescription("Monte à bord avec Bastard Sound System pour un sacré voyage où ta musique explose en un feu d'artifice visuel&nbsp;! On se contente pas de créer des pochettes, on fabrique des chefs-d'œuvre qui hurlent l'âme de ta musique à plein poumon. Chaque artwork d'album ou d'EP est une explosion d'inspiration, conçue pour captiver tes fans dès le premier coup d'œil. Nos graphistes sont des virtuoses de la création, mélangeant les images, les couleurs, les textures et les typos pour transmettre ton style unique et rebelle. Que ce soit pour un album qui déchire les charts ou un EP qui fait vibrer les cœurs, nos pochettes sont le premier accord d'une symphonie visuelle qui magnifie ton génie musical. Avec nous, chaque cover est un ticket d'entrée dans l'univers que tu sculptes avec tes mélodies. Alors, prêt à foutre le feu au monde&nbsp;? Laisse-nous donner vie à la bande-son de ta révolte&nbsp;!")
            ->setCover('covers.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory('Management')
            ->setName('Merchandising')
            ->setTitle("Aaah ces p'tits objets qu'on jettera jamais&nbsp;!")
            ->setDescription("On transforme ton swag en or pur. Imagine une gamme de merch tellement badass que tout le monde se battrait pour l'arborer ou l'exhiber fièrement sur leur bureau. T-shirts, casquettes, badges, et bien d'autres trucs encore - chaque pièce est pensée pour faire des envieux. On capte l'essence de ta marque, ton style, et on le fusionne avec le top du design pour créer des articles que tes fans vont s'arracher comme des affamés. On prend en charge tout, de la conception à la fabrication, en veillant à ce que chaque produit soit un foutu chef-d'œuvre de créativité. Alors, prêt à voir ton logo partout, porté par une horde de fans et convoité par tous leurs potes&nbsp;? Laisse-nous propulser ton merch dans la stratosphère du cool, et même plus loin que ça&nbsp;!")
            ->setCover('merchandising.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory('Management')
            ->setName("Contrats d'engagement")
            ->setTitle('Contrat blindé = Show sans souci')
            ->setDescription("Avec une rigueur inégalée, nous rédigeons tes contrats d'engagement avant chaque événement, garantissant que chaque aspect légal et administratif de ta carrière soit couvert avec précision. Pour les contrats d'engagement, nous veillons à ce que tes droits soient protégés, que tes obligations soient clairement définies, et que tes intérêts soient sauvegardés, te permettant ainsi de te produire avec confiance et sécurité. Tu vas enfin pouvoir te détendre, car les pannes, les annulations, les casses de matos, tout ça c'est enfin prévu et géré&nbsp;! Avec notre assistance, tu surfes sur les vagues des réglementations et des formalités avec panache, en te concentrant sur ce que tu fais de mieux&nbsp;:&nbsp;créer et performer.")
            ->setCover('contrats-d-engagement.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory('Management')
            ->setName('Déclarations & Assurances')
            ->setTitle('Toute votre paperasse, sans le mal de crâne')
            ->setDescription("On se charge de tout le bazar des assurances, du matos jusqu'à l'orga de tes events, pour que tu puisses taffer l'esprit tranquille. On élabore et on gère les contrats d'assurance pour ton matos de scène, tes instruments et toutes ces foutues technologies indispensables, histoire de te garantir que chaque pièce de ton arsenal soit blindée contre les coups du sort. Pour les assurances liées à tes concerts et événements, on s'assure que t'as rien à craindre, que ce soit des responsabilités civiles ou des risques propres à la scène live. Et en ce qui concerne les déclarations, comme celles à la SACEM ou autres organismes, nous les préparons minutieusement pour assurer que toutes tes œuvres soient correctement enregistrées et que tes revenus de droits d'auteur soient optimisés. Avec nous aux manettes, t'as une couverture béton qui te laisse kiffer à fond sur la création et le show, sans te soucier des embrouilles du bizness.")
            ->setCover('declarations-et-assurances.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory('Organisation')
            ->setName('Concerts & Tournées')
            ->setTitle('Le live de votre vie&nbsp;!')
            ->setDescription("Nous transcendons l'art de l'organisation de concerts et de tournées, en assurant une coordination qui déchire de chaque moment, du premier riff au dernier rappel. Notre équipe badass prend les commandes de A à Z, de la réservation des lieux à la logistique des tournées, veillant à ce que chaque détail soit ajusté au poil. On gère les horaires, les accords avec les salles, les tripes techniques, et on s'assure que chaque show soit propulsé par une logistique béton. Notre méthode précise et détonante garantit que les artistes puissent se lâcher sur scène, tandis que nous créons l'arène parfaite pour que chaque concert soit une explosion de succès&nbsp;!")
            ->setCover('concerts-et-tournees.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory('Organisation')
            ->setName('Régie Technique')
            ->setTitle("On coordonne les techos et ça file droit&nbsp;!")
            ->setDescription("On prend le contrôle de la régie technique de tes événements, assurant une exécution technique qui claque à chaque spectacle. Notre bande de pros gère le gros son, les jeux de lumières, les vidéos et les effets spéciaux, s'assurant que chaque composante technique soit à la hauteur de tes attentes de rock star. On travaille main dans la main avec les artistes et les techos pour peaufiner et booster chaque set-up, tout en gérant les imprévus avec une rapidité qui tue. Avec notre expertise pointue et notre gestion sans compromis, tu peux te jeter sur scène les yeux fermés, sûr que toute la machinerie technique backe ton show à fond.")
            ->setCover('regie-technique.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory('Organisation')
            ->setName('Co-Organisation')
            ->setTitle("Besoin d'aide pour organiser votre live&nbsp;?")
            ->setDescription("Si t'as envie de faire vibrer les murs et secouer les foules, t'as frappé à la bonne porte. On débarque dans ton lieu avec la rage du rock et l'énergie qui défonce tout sur son passage. On te propose de co-organiser des concerts et des spectacles qui vont tout arracher. T'occupe pas de la logistique, on gère tout de A à Z, du son qui claque aux lumières qui ensorcellent. Toi, tu fais ce que tu sais faire de mieux&nbsp;:&nbsp;allumer le feu. Ensemble, on va tracer un sillon de légende, alors prépare-toi à vivre des moments mémorables. Let's rock&nbsp;!")
            ->setCover('co-organisation.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory('Production')
            ->setName('Live Recording')
            ->setTitle("This is a microphone, not a miracle")
            ->setDescription("Enregistre tes lives comme jamais&nbsp;! On te propose de capturer chaque note, chaque cri, chaque moment de pure folie pendant tes concerts. On s'occupe de tout&nbsp;:&nbsp;de l'enregistrement à la console, du mixage aux arrangements, pour que tes performances soient immortalisées dans des EP et des albums live qui claquent. On transforme tes shows en souvenirs indélébiles, gravés dans les mémoires pour l'éternité. Prêt à faire résonner ton son bien au-delà des murs&nbsp;? On est là pour ça. Let's make history&nbsp;!")
            ->setCover('live-recording.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory('Production')
            ->setName('Pressage CD & Vinyle')
            ->setTitle('Gravez votre son dans la pierre&nbsp;!')
            ->setDescription("T'as un son qui déchire et tu veux l'immortaliser sur CD ou vinyle&nbsp;? T'inquiète, on s'en charge avec nos partenaires de choc&nbsp;! On s'occupe du pressage, de la gravure, et de tout ce qui va avec pour que ton art prenne vie sur les meilleurs supports. Chaque note, chaque riff, chaque beat sera gravé avec une précision chirurgicale pour un rendu à la hauteur de tes attentes. CD, vinyle, peu importe, on veille à ce que chaque disque soit parfait, prêt à être écouté en boucle et chéri par tes fans. On te garantit un produit final qui respire la qualité et le professionnalisme. Toi, t'as plus qu'à te concentrer sur ta musique, on s'occupe du reste. Let's make it spin and rock the world&nbsp;!")
            ->setCover('pressage.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory('Production')
            ->setName('Diffusion multi-canaux')
            ->setTitle('Rayonnez autour du monde et dans la galaxie&nbsp;!')
            ->setDescription("Ça y est, ton son claque, et tu veux maintenant le partager avec le monde entier&nbsp;? T'inquiète, là encore on s'occupe de tout&nbsp;! On balance ta musique sur toutes les plateformes de streaming&nbsp;:&nbsp;Spotify, Apple Music, Deezer, et bien d'autres encore. Ton son sera partout, prêt à être découvert par des milliers de fans potentiels. Mais ça ne s'arrête pas là. Grâce à notre réseau bien ficelé, on contacte les médias locaux pour que ta musique fasse du bruit dans ta région. Radios, blogs, journaux, on les alerte pour qu'ils parlent de toi, te chroniquent, et te mettent en avant. Ta musique mérite d'être entendue, et on va faire en sorte qu'elle résonne partout. Toi, tu te concentres sur créer et performer, nous, on s'occupe de la diffusion et de la promotion. Let's spread the vibe and make some noise&nbsp;!")
            ->setCover('diffusion.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory('Production')
            ->setName('Co-Production')
            ->setTitle('Un coup de main pour la prod&nbsp;?')
            ->setDescription("T'as une boîte ou une asso et tu manques de bras ou de réseau pour faire exploser ton projet musical&nbsp;? On est là pour co-produire avec toi et t'apporter tout ce qu'il faut pour réussir. On enregistre tes lives, on les mixe et on les produit pour créer des EP et des albums live qui resteront gravés dans les mémoires. Ensuite, on s'occupe du pressage de tes CD et vinyles avec nos partenaires de choc, garantissant une qualité impeccable. Enfin, on balance ta musique sur toutes les plateformes de streaming et on utilise notre réseau avec les médias locaux pour que ton son soit entendu partout. Ensemble, on va tout déchirer et faire résonner ta musique bien au-delà des murs de ton lieu. Let's rock this&nbsp;!")
            ->setCover('co-production.webp')
            ->setActive(true);
        $manager->persist($service);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 2;
    }
}

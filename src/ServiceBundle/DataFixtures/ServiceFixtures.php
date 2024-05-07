<?php

namespace App\ServiceBundle\DataFixtures;

use App\ServiceBundle\Entity\Service;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ServiceFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $service = (new Service())
            ->setCategory($this->getReference('category-visuels'))
            ->setName('Logos')
            ->setSlug('logos')
            ->setDescription("T'es prêt à déchirer et laisser ta trace dans l'histoire du rock ? On se contente pas de balancer des logos plan-plan ; on découpe dans le gras pour créer des symboles qui fracassent. Avec une créativité qui déborde et un flair artistique plus tranchant qu'une lame de rasoir, on bosse avec toi pour sculpter un logo qui respire l'essence de ta troupe. Que tu veuilles capter la rage du punk rock, la puissance brute du métal, ou l'âme envoûtante du blues, on est là pour transformer ton style et ta passion en un putain de symbole visuel qui déboîte. Un logo qui déchire pas seulement visuellement, mais qui te prend aux tripes, un cri de guerre pour tes fans et un étendard sous lequel foutre le feu. Rejoins-nous, et ensemble, on va créer le logo qui fera de ta bande une putain de légende !")
            ->setCover('logos.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-visuels'))
            ->setName('Covers')
            ->setSlug('covers')
            ->setDescription("Monte à bord avec Bastard Sound System pour un sacré voyage où ta musique explose en un feu d'artifice visuel ! On se contente pas de créer des pochettes, on fabrique des chefs-d'œuvre qui hurlent l'âme de ta musique à plein poumon. Chaque artwork d'album ou d'EP est une explosion d'inspiration, conçue pour captiver tes fans dès le premier coup d'œil. Nos graphistes sont des virtuoses de la création, mélangeant les images, les couleurs, les textures et les typos pour transmettre ton style unique et rebelle. Que ce soit pour un album qui déchire les charts ou un EP qui fait vibrer les cœurs, nos pochettes sont le premier accord d'une symphonie visuelle qui magnifie ton génie musical. Avec nous, chaque cover est un ticket d'entrée dans l'univers que tu sculptes avec tes mélodies. Alors, prêt à foutre le feu au monde ? Laisse-nous donner vie à la bande-son de ta révolte !")
            ->setCover('covers.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-visuels'))
            ->setName("Merch'")
            ->setSlug('merchandising')
            ->setDescription("On transforme ton swag en pur or. Imagine une gamme de merch tellement badass que tout le monde se battrait pour l'arborer ou l'exhiber fièrement sur leur bureau. T-shirts, casquettes, badges, et bien d'autres trucs encore - chaque pièce est pensée pour faire des envieux. On capte l'essence de ta marque, ton style, et on le fusionne avec le top du design pour créer des articles que tes fans vont s'arracher comme des affamés. On prend en charge tout, de la conception à la fabrication, en veillant à ce que chaque produit soit un foutu chef-d'œuvre de créativité. Alors, prêt à voir ton logo partout, porté par une horde de fans et convoité par tous leurs potes ? Laisse-nous propulser ton merch dans la stratosphère du cool, et même plus loin que ça !")
            ->setCover('merchandising.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-communication'))
            ->setName('Médias Locaux')
            ->setSlug('medias-locaux')
            ->setDescription("Prêt à secouer les ondes de ton coin et bien au-delà ? On va pas seulement te caser des interviews, on organise une vraie invasion médiatique. On te décroche des places dans les médias locaux et régionaux, là où tout le monde pourra se régaler de tes mots et surtout, kiffer ce que tu débites. On travaille les angles, on te forge une histoire tellement captivante que les journalistes se battront pour diffuser ta zique. On fait en sorte que chaque passage à l'antenne soit un tremplin pour ta réputation, transformant chaque écoute en une opportunité de gagner des fans à ta cause. Avec nous dans ta team, prépare-toi à squatter les playlists et à retourner les crânes, car ta musique ne sera pas juste entendue ; elle sera vécue et ressentie jusqu'au tréfonds de l'âme !")
            ->setCover('medias-locaux.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-communication'))
            ->setName('Plateformes de Streaming')
            ->setSlug('plateformes-streaming')
            ->setDescription("Prêt à faire exploser des oreillettes ? On prend les commandes pour te propulser sur les plateformes de streaming où tout le monde écoute, partage et vibre au rythme de la musique. On gère tout : inscription, upload de tes albums, et mise en lumière de tes tracks. Imagine ton nom briller sur Spotify, Apple Music, Deezer - partout où les oreilles en quête de nouveautés cherchent leur prochain coup de cœur musical. On se contente pas juste de te caser dans une playlist; on s'assure que tes sons accrochent l'attention, que chaque morceau résonne dans les écouteurs et les enceintes aux quatre coins du globe. Avec nous, tu lances pas juste tes albums en ligne; tu déclenches une foutue révolution sonore prête à conquérir la planète. Prépare-toi, car c'est ton moment de briller sur la scène numérique !")
            ->setCover('plateformes-streaming.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-communication'))
            ->setName('Réseaux Sociaux')
            ->setSlug('reseaux-sociaux')
            ->setDescription("Il est temps de foutre le feu sur les scènes virtuelles où la musique règne en maître, non ? On t'emmène sur les réseaux sociaux dédiés à la musique comme Bandcamp, SoundCloud, ou YouTube, là où les vrais amateurs et créateurs de musique se rencontrent. On peaufine ton profil, on charge tes meilleurs morceaux, et on crée du contenu qui capte l'essence de ton art. Avec des stratégies bien affûtées et des campagnes ciblées, on fait en sorte que ta musique ne soit pas juste en arrière-plan, mais qu'elle prenne sacrément la lumière. On booste les interactions, on multiplie les écoutes, et on transforme chaque follower en fanatique de toi. Enfile ta veste de rockstar, parce qu'avec nous aux commandes, tu vas pas seulement participer à la conversation musicale, tu vas la dominer. Prépare-toi à voir ton audience s'agrandir et ton influence exploser ! On te plonge dans une aventure digitale où tu seras plus qu'un simple artiste, tu seras une icône musicale qui marque les esprits et les playlists. Alors, t'es prêt à devenir la nouvelle obsession des mélomanes ? Laisse-nous t'élever au sommet de la scène virtuelle et faire de toi la légende que t'es destiné à être !")
            ->setCover('reseaux-sociaux.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-dossiers'))
            ->setName('Fiches Techniques')
            ->setSlug('fiches-techniques')
            ->setDescription("Tu veux que chaque concert soit une explosion de décibels et de lumières, sans aucun accroc ni prise de tête ? On prend les choses en main pour créer tes fiches techniques et tes riders de A à Z, en nous assurant que chaque petit détail soit parfaitement adapté à tes besoins de rockstar. Que ce soit pour une performance live, une tournée, ou un événement spécial, on élabore chaque document avec une précision chirurgicale, digne des meilleurs roadies. Nos fiches techniques mettent en lumière les spécificités de ton équipement sonore et lumineux, garantissant que rien ne soit laissé au hasard. Quant aux riders, ils détaillent tes exigences artistiques et logistiques, assurant que tout soit en place pour que tu puisses entrer en scène comme un vrai boss. Avec nous, prépare-toi à voir tes besoins se concrétiser en une réalité technique et logistique impeccable, pour que chaque spectacle soit une démonstration de maîtrise et de professionnalisme qui laissera ton public ébahi et conquis. Alors, prêt à enflammer les scènes avec une organisation sans faille ? Laisse-nous t'aider à faire de chaque concert une expérience mémorable et rock'n'roll qui fera trembler les murs et les tympans !")
            ->setCover('fiches-techniques.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-dossiers'))
            ->setName('Plans de Scène')
            ->setDescription("Tous nos plans de scène et patch lists sont taillés avec une précision d'orfèvre, pour que chaque élément de ta performance soit orchestré à la perfection. On détaille l'emplacement précis de chaque instrument, chaque pièce d'équipement et chaque acteur, garantissant une harmonie et une efficacité maximales pendant tes spectacles. Et nos patch lists ? On les élabore pour que chaque connexion audio et lumière soit pas seulement optimale mais aussi intuitive, facilitant la vie de tes techniciens et assurant une transition fluide entre les différentes parties de ton show. Avec nos documents, chaque putain de détail technique est anticipé et maîtrisé, te permettant de te concentrer pleinement sur l'art de la performance et de déchaîner ton énergie rock'n'roll sur scène. Alors, prépare-toi à mettre le feu à la scène avec une organisation sans faille et une performance qui laissera ton public ébahi et conquis.")
            ->setSlug('plans-de-scene')
            ->setCover('plans-de-scene.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-contrats'))
            ->setName('Contrats')
            ->setSlug('contrats')
            ->setDescription("Avec une rigueur inégalée, nous rédigeons tes contrats d'engagement et tes déclarations, garantissant que chaque aspect légal et administratif de ta carrière soit couvert avec précision. Pour les contrats d'engagement, nous veillons à ce que tes droits soient protégés, que tes obligations soient clairement définies, et que tes intérêts soient sauvegardés, te permettant ainsi de te produire avec confiance et sécurité. En ce qui concerne les déclarations, comme celles à la SACEM ou autres organismes, nous les préparons minutieusement pour assurer que toutes tes œuvres soient correctement enregistrées et que tes revenus de droits d'auteur soient optimisés. Avec notre assistance, tu navigues le monde complexe des réglementations et des formalités avec aisance, te concentrant sur ce que tu fais de mieux : créer et performer.")
            ->setCover('contrats.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-contrats'))
            ->setName('Assurances')
            ->setSlug('assurances')
            ->setDescription("On se charge de tout le bazar des assurances, du matos jusqu'à l'orga de tes events, pour que tu puisses taffer l'esprit tranquille. On élabore et on gère les contrats d'assurance pour ton matos de scène, tes instruments et toutes ces foutues technologies indispensables, histoire de te garantir que chaque pièce de ton arsenal soit blindée contre les coups du sort. Pour les assurances liées à tes concerts et événements, on s'assure que t'as rien à craindre, que ce soit des responsabilités civiles ou des risques propres à la scène live. On bosse avec des assureurs qui connaissent leur taf pour te sortir des contrats sur mesure qui collent pile poil à tes besoins et à ceux de ton crew. Avec nous aux manettes, t'as une couverture béton qui te laisse kiffer à fond sur la création et le show, sans te soucier des embrouilles du bizness.")
            ->setCover('assurances.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-prestations'))
            ->setName('Sonorisation')
            ->setSlug('sonorisation')
            ->setDescription("Accroche-toi bien, car on va secouer les murs et chatouiller les tympans de ton public ! On sait comment balancer le son pour tes spectacles et tes lives, en s'assurant que chaque note et chaque foutu mot soient entendus avec une clarté à tous leur coller la chair de poule. Que ce soit dans une cave enfumée ou dans un stade plein à craquer, notre matos dernier cri et notre expertise technique garantissent que ta musique soit toujours au-dessus du bordel ambiant. On crée une méga ambiance où chaque vibration fait vibrer la foule comme jamais. Avec nous aux manettes du son, prépare-toi à voir ton public se lever, écouter et ressentir chaque satané moment comme si c'était la première fois. On ne se contente pas de sonoriser ton show ; on le transcende pour en faire une expérience légendaire !")
            ->setCover('sonorisation.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-prestations'))
            ->setName('Lights & Vidéo')
            ->setSlug('lights-et-video')
            ->setDescription("On met le feu à tes performances live et à tes clips avec des jeux de lumière et des effets vidéo qui déchirent tout. Pour tes concerts, on crée une ambiance d'enfer qui te plonge dedans avec des lumières qui bougent et des projections qui claquent à chaque note. Et pour tes clips, on balance de la créativité visuelle et une histoire qui tient en haleine, en utilisant des techniques de pointe pour donner vie à ta musique. Chacun de tes projet est une occasion de laisser une vraie trace, pour que ton show et que tes vidéos restent gravés dans les mémoires, à jamais.")
            ->setCover('lights-et-video.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-prestations'))
            ->setName('Plateau')
            ->setSlug('plateau')
            ->setDescription("Nous prenons en charge tous les aspects de la scène et du plateau pour que tes performances soient inoubliables. Nous gérons la conception et la configuration de l'espace scénique, en veillant à ce que chaque élément, des décors aux installations techniques, soit parfaitement intégré et fonctionnel. Notre expertise couvre également la logistique du plateau, assurant que tout le matériel nécessaire est prêt et à portée de main pour chaque moment du spectacle. Que ce soit pour un concert, un événement en direct ou un tournage de clip, nous créons un environnement de performance qui non seulement répond à tes besoins artistiques mais renforce aussi l'impact de ta présence sur scène.")
            ->setCover('plateau.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-regie'))
            ->setName('Régie Générale')
            ->setSlug('regie-generale')
            ->setDescription("Nous assurons la régie générale de tes événements, orchestrant avec précision chaque détail pour garantir un déroulement impeccable. Notre équipe coordonne tous les aspects logistiques, de la planification des horaires à la gestion des équipes sur le terrain, en passant par la supervision des installations techniques. Nous veillons à ce que les transitions soient fluides et que chaque élément de l'événement s'harmonise parfaitement, depuis l'accueil des artistes jusqu'au démontage final. Notre expertise en régie générale te permet de te concentrer pleinement sur ta performance, en sachant que l'organisation pratique est entre des mains expertes !")
            ->setCover('regie-generale.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-regie'))
            ->setName('Régie Technique')
            ->setSlug('regie-technique')
            ->setDescription("Nous prenons en main la régie technique de tes événements, assurant une exécution technique sans faille pour chaque spectacle. Notre équipe spécialisée gère tout, des systèmes de sonorisation et d'éclairage à la vidéo et aux effets spéciaux, garantissant que chaque aspect technique répond aux exigences de ta performance. Nous coordonnons étroitement avec les artistes et les techniciens pour adapter et optimiser chaque configuration, tout en anticipant et en résolvant rapidement les problèmes techniques. Avec notre gestion rigoureuse et experte, tu peux te lancer sur scène en toute confiance, sachant que l'ensemble de l'infrastructure technique soutient sans faille ton art.")
            ->setCover('regie-technique.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-regie'))
            ->setName('Accueil & Catering')
            ->setSlug('accueil-et-catering')
            ->setDescription("Nous orchestrons méticuleusement l'accueil, la billetterie et le catering de tes événements pour garantir une expérience mémorable dès l'entrée des invités. Notre équipe gère l'accueil avec professionnalisme, veillant à ce que chaque visiteur soit reçu chaleureusement et dirigé efficacement. La billetterie est opérée avec une précision sans faille, s'assurant que les flux de spectateurs soient fluides et que toutes les transactions se déroulent sans accroc. Quant au catering, nous proposons une sélection variée de nourriture et de boissons de qualité, préparées pour satisfaire tous les goûts et adaptées à l'événement. Chaque aspect est pensé pour enrichir l'expérience globale, faisant de ton événement un moment où chaque détail compte.")
            ->setCover('accueil-et-catering.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-organisation'))
            ->setName('Concerts & Tournées')
            ->setSlug('concerts-et-tournees')
            ->setDescription("Nous excellons dans l'organisation de concerts et de tournées, assurant une coordination impeccable de chaque étape, du premier accord au rappel final. Notre équipe prend en charge la planification complète, de la réservation des lieux à la logistique des déplacements, en veillant à ce que chaque aspect de l'événement ou de la tournée soit méticuleusement orchestré. Nous gérons les horaires, la coordination avec les lieux, les besoins techniques, et nous assurons que chaque performance soit soutenue par une logistique sans faille. Notre approche détaillée garantit que les artistes peuvent se concentrer sur leur performance, tandis que nous créons les conditions idéales pour que chaque show soit un succès retentissant !")
            ->setCover('concerts-et-tournees.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-organisation'))
            ->setName('Enregistrement Live & Studio')
            ->setSlug('enregistrement-live-et-studio')
            ->setDescription("Nous maîtrisons l'art de l'enregistrement live et en studio, garantissant que chaque note et chaque nuance de ta performance soit capturée avec la plus haute fidélité. En live, nous déployons des technologies de pointe pour enregistrer le dynamisme et l'énergie de tes concerts, en préservant l'authenticité de l'expérience sonore pour que tes fans puissent revivre l'intensité de l'événement. En studio, notre approche est tout aussi méticuleuse : nous créons un environnement acoustiquement optimisé où chaque détail sonore peut être finement ajusté et maîtrisé. Que ce soit pour une prise unique ou pour une production complexe multi-pistes, notre équipe technique spécialisée assure que le produit final transcende les attentes, en te fournissant des enregistrements d'une qualité exceptionnelle qui résonnent avec ton public.")
            ->setCover('enregistrement-live-et-studio.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-organisation'))
            ->setName('Spectacle Vivant')
            ->setSlug('spectacle-vivant')
            ->setDescription("Nous excellons également dans l'organisation de spectacles vivants, en apportant notre expertise pour orchestrer des performances mémorables dans des domaines tels que le théâtre, la danse, et les arts du cirque. Notre équipe s'occupe de tout, de la conception initiale à la réalisation finale, en passant par la coordination des artistes, la gestion technique, et la logistique événementielle. Nous travaillons étroitement avec les créateurs et les interprètes pour s'assurer que chaque aspect du spectacle est harmonieusement intégré, créant ainsi une expérience fluide et captivante pour le public. Grâce à notre gestion rigoureuse et notre sens du détail, chaque spectacle est une célébration de l'art vivant, conçu pour émouvoir, engager et inspirer les spectateurs.")
            ->setCover('spectacle-vivant.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-formation'))
            ->setName('Ateliers Régie')
            ->setSlug('ateliers-regie')
            ->setDescription("Nous organisons également des ateliers de formation dédiés à la régie technique et générale, visant à former les futurs professionnels de l'industrie du spectacle. Ces sessions sont conçues pour transmettre des compétences essentielles en gestion de la production et de la logistique d'événements, de la sonorisation à l'éclairage, en passant par la coordination sur site. Nos formateurs, tous experts dans leur domaine, partagent leur savoir et leurs expériences pour préparer les participants à gérer efficacement tous les aspects techniques d'un spectacle ou d'un événement. Les ateliers combinent théorie et pratique, offrant aux stagiaires l'opportunité de travailler sur des projets réels et de développer une compréhension approfondie des défis et des solutions dans le monde de la production événementielle.")
            ->setCover('ateliers-regie.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-formation'))
            ->setName('Ateliers Techos')
            ->setSlug('ateliers-technique')
            ->setDescription("Nous proposons des ateliers de formation complets couvrant les techniques de son, lumière, vidéo, et gestion de plateau, destinés à préparer les participants à exceller dans l'industrie du spectacle. Animés par des professionnels expérimentés, ces ateliers enseignent des compétences pratiques et théoriques allant de la configuration des équipements audio, à la maîtrise de systèmes d'éclairage sophistiqués, en passant par les techniques de capture et d'édition vidéo, jusqu'à la coordination efficace des aspects techniques et créatifs sur le plateau. Chaque session combine théorie et pratique pour offrir une expérience d'apprentissage immersive, permettant aux stagiaires de développer des compétences directement applicables dans des environnements professionnels, les préparant à gérer des productions de haute qualité avec assurance et créativité.")
            ->setCover('ateliers-technique.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-formation'))
            ->setName('Ateliers Orga')
            ->setSlug('ateliers-organisation')
            ->setDescription("Nous proposons également des ateliers de formation dédiés à l'organisation de spectacles, de concerts live et de tournées, conçus pour transmettre des compétences essentielles en gestion d'événements. Ces formations couvrent tous les aspects de la planification et de l'exécution d'événements, de la négociation avec les lieux et les artistes, à la gestion des horaires, en passant par la coordination des équipes sur le terrain et la supervision de la logistique. Animés par des professionnels aguerris de l'industrie, ces ateliers offrent aux participants des connaissances pratiques et des outils pour orchestrer avec succès tout type d'événement musical ou de performance. Chaque session est structurée pour intégrer des exercices pratiques, des études de cas, et des simulations, permettant aux stagiaires d'acquérir une expérience précieuse et de développer une compréhension approfondie des défis spécifiques à l'organisation d'événements à grande échelle.")
            ->setCover('ateliers-organisation.webp')
            ->setActive(true);
        $manager->persist($service);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 14;
    }
}

<?php

namespace App\ServiceBundle\DataFixtures;

use App\ServiceBundle\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $category = (new Category())
            ->setType('adherent')
            ->setName("Visuels & Comm'")
            ->setSlug('visuels-et-communication')
            ->setTitle('Et vos yeux en prennent plein les dents !')
            ->setCover('visuels-et-communication.webp')
            ->setActive(true);
        $manager->persist($category);
        $this->addReference('category-visuels-et-communication', $category);

        $category = (new Category())
            ->setType('adherent')
            ->setParent($this->getReference('category-visuels-et-communication'))
            ->setName('On vous dessine')
            ->setSlug('visuels')
            ->setTitle("Des visuels qui s'incrustent")
            ->setDescription("Bastard Sound System, c'est pas juste du son, c'est tout un style de vie ! Besoin d'un logo qui claque comme un riff endiablé ? Un cover d'album qui crie au monde que tu es la prochaine légende du rock ? Ou peut-être un T-shirt tellement badass que même les rock stars voudraient te le piquer ? Chez nous, on fabrique des visuels qui arrachent, qui te font vibrer au rythme du pur rock'n'roll. Nos créations ? Elles ont l'attitude, le charisme et le swag pour faire de toi la tête d'affiche. Alors, si t'es prêt à monter le volume et à te démarquer avec des designs aussi explosifs que tes solos, tu sais où frapper. Bastard Sound System, là où chaque logo, chaque médiator, chaque pochette est un hymne au rock et à la beauté !")
            ->setCover('visuels.webp')
            ->setActive(true);
        $manager->persist($category);
        $this->addReference('category-visuels', $category);

        $category = (new Category())
            ->setType('adherent')
            ->setParent($this->getReference('category-visuels-et-communication'))
            ->setName('On vous diffuse partout')
            ->setSlug('communication')
            ->setTitle('On va bientôt entendre parler de vous')
            ->setDescription("Chez BSS, on booste ta carrière jusqu'aux étoiles, aussi avec un plan de comm' qui envoie du lourd ! Imagine un dossier de presse aussi percutant qu’un solo de guitare, des interviews dans les médias qui te font briller comme une star du rock, et une présence sur les réseaux sociaux qui fait exploser ton fanbase. Oui, mon pote, on s’occupe de te monter une scène médiatique où chaque post, chaque article te propulse sous les projecteurs. Bastard Sound System, c’est le manager de comm' qui fait vibrer ton univers musical, te donnant un coup de projecteur là où ça compte vraiment. On s’occupe de ta pub comme on riff sur une Gibson – avec passion et précision. Prépare-toi à faire du bruit dans le bon sens du terme !")
            ->setCover('communication.webp')
            ->setActive(true);
        $manager->persist($category);
        $this->addReference('category-communication', $category);

        $category = (new Category())
            ->setType('adherent')
            ->setName('Dossiers & Contrats')
            ->setSlug('dossiers-et-contrats')
            ->setTitle("La paperasse, c'est pas votre taf !")
            ->setCover('dossiers-et-contrats.webp')
            ->setActive(true);
        $manager->persist($category);
        $this->addReference('category-dossiers-et-contrats', $category);

        $category = (new Category())
            ->setType('adherent')
            ->setParent($this->getReference('category-dossiers-et-contrats'))
            ->setName('Votre Dossier Technique')
            ->setSlug('dossiers')
            ->setTitle('Backstage Bosses - On règle la scène, vous déchirez')
            ->setDescription("Marre de jongler avec les fiches techniques, les plans de scène, les patch lists et les riders ? Laissez-nous prendre le relais ! On est les magiciens du backstage ! On fabrique tout ça pour vous avec tellement de style que même les techniciens en coulisses vont vouloir un autographe. Imaginez : vous arrivez, tout est calé, accordé comme les cordes de vos instrus. Plus besoin de vous arracher les cheveux pour savoir qui branche quoi et où. Avec nous, c’est simple : vous faites vibrer le public, on s’occupe du reste. Bastard Sound System, c’est votre chef d’orchestre technique, pour que vous puissiez vous concentrer sur le show, pas sur les câbles !")
            ->setCover('dossiers.webp')
            ->setActive(true);
        $manager->persist($category);
        $this->addReference('category-dossiers', $category);

        $category = (new Category())
            ->setType('adherent')
            ->setParent($this->getReference('category-dossiers-et-contrats'))
            ->setName('Toute votre paperasse')
            ->setSlug('contrats')
            ->setTitle('Contrats blindés = Show sans souci')
            ->setDescription("Et puis aussi, chez Bastard Sound System, on sait que dans le grand show rock'n'roll du spectacle et de la zic, sécuriser tes contrats c’est aussi crucial que de s’équiper de son meilleur cuir avant de monter sur scène. On te fabrique des contrats d'engagement d'artistes en béton, sur mesure, pour que toi et tes potes de la scène puissiez dormir sur vos deux oreilles sans vous soucier des galères. Oublie les prises de tête administratives, les assurances matos, et les déclarations SACEM. On s’occupe de tout ce bazar pour que tu puisses juste te lâcher et enflammer la foule. Rock on sans tracas, Bastard Sound System garde les arrières et veille au grain !")
            ->setCover('contrats.webp')
            ->setActive(true);
        $manager->persist($category);
        $this->addReference('category-contrats', $category);

        $category = (new Category())
            ->setType('partenaire')
            ->setName('Prestations & Régie')
            ->setSlug('prestations-et-regie')
            ->setTitle('Ça va secouer dans les chaumières !')
            ->setCover('prestations-et-regie.webp')
            ->setActive(true);
        $manager->persist($category);
        $this->addReference('category-prestations-et-regie', $category);

        $category = (new Category())
            ->setType('partenaire')
            ->setParent($this->getReference('category-prestations-et-regie'))
            ->setName('High Technique')
            ->setSlug('prestations')
            ->setTitle('Des prestas aux oignons')
            ->setDescription("T'es prêt à faire vibrer tes événements avec du son et de la lumière qui envoient du lourd ? Chez BSS, les prestas, c'est du sérieux : on peaufine chaque détail pour que ton show crève le plafond. Que ce soit pour balancer des basses qui font trembler le sol ou pour illuminer ta scène comme jamais, on maîtrise le jeu. Et pour le plateau ? Laisse tomber, on gère chaque angle comme des chefs. Même les chemins de câbles se planquent quand on est là. Alors oublie les soucis, avec nous à tes côtés, ton plan va déchirer !")
            ->setCover('prestations.webp')
            ->setActive(true);
        $manager->persist($category);
        $this->addReference('category-prestations', $category);

        $category = (new Category())
            ->setType('partenaire')
            ->setParent($this->getReference('category-prestations-et-regie'))
            ->setName('Totale gestion')
            ->setSlug('regie')
            ->setTitle("On s'occupe de tout le micmac")
            ->setDescription("Tu veux une orga qui claque ? On est là pour ça. Notre équipe de régies, générale et technique, c'est la crème de la crème pour que tout roule sans accrocs. On orchestre chaque détail, de la logistique au dernier câble, sans oublier le sacro-saint catering, pour que ton événement soit une pure réussite. Avec nous aux manettes, détends-toi : on assure le show de A à Z, et on transforme chaque galère en pure magie. Oublie le stress, on gère le chaos pour que tu puisses te concentrer sur ce que tu fais de mieux : enflammer la scène !")
            ->setCover('regie.webp')
            ->setActive(true);
        $manager->persist($category);
        $this->addReference('category-regie', $category);

        $category = (new Category())
            ->setType('partenaire')
            ->setName('Orga & Formation')
            ->setSlug('organisation-et-formation')
            ->setTitle('On fait des équipes qui gagnent')
            ->setCover('organisation-et-formation.webp')
            ->setActive(true);
        $manager->persist($category);
        $this->addReference('category-organisation-et-formation', $category);

        $category = (new Category())
            ->setType('partenaire')
            ->setParent($this->getReference('category-organisation-et-formation'))
            ->setName('Tous en scène')
            ->setSlug('organisation')
            ->setTitle('Le live de votre vie')
            ->setDescription("T'es prêt à faire vibrer tes événements avec du son et de la lumière qui envoient du lourd ? Chez BSS, les prestas, c'est du sérieux : on peaufine chaque détail pour que ton show crève le plafond. Que ce soit pour balancer des basses qui font trembler le sol ou pour illuminer ta scène comme jamais, on maîtrise le jeu. Et pour le plateau ? Laisse tomber, on gère chaque angle comme des chefs. Même les chemins de câbles se planquent quand on est là. Alors oublie les soucis, avec nous à tes côtés, ton plan va déchirer !")
            ->setCover('organisation.webp')
            ->setActive(true);
        $manager->persist($category);
        $this->addReference('category-organisation', $category);

        $category = (new Category())
            ->setType('partenaire')
            ->setParent($this->getReference('category-organisation-et-formation'))
            ->setName('Prenez un crayon')
            ->setSlug('formation')
            ->setTitle('Pour les padawans')
            ->setDescription("Décolle vers de nouveaux horizons avec nos ateliers de formation, parfaits pour toi, futur maître de la scène et du studio ! Que tu sois un beginner de la régie, de la sono, des lights, du plateau ou de l’organisation d’événements, nos sessions sont ta rampe de lancement. On t'initie aux secrets des pros pour que tu puisses piloter ton show comme un Jedi maîtrise la Force. Apprends à orchestrer les équipements, à illuminer les performances et à captiver les foules. Alors Enfile ta cape, rejoins la Team BSS et transforme ta passion en une carrière qui t'enverra vers les étoiles !")
            ->setCover('formation.webp')
            ->setActive(true);
        $manager->persist($category);
        $this->addReference('category-formation', $category);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 13;
    }
}

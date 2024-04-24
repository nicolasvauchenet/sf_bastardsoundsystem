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
            ->setCover('logos.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-visuels'))
            ->setName('Covers')
            ->setSlug('covers')
            ->setCover('covers.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-visuels'))
            ->setName("Merch'")
            ->setSlug('merchandising')
            ->setCover('merchandising.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-communication'))
            ->setName('Médias Locaux')
            ->setSlug('medias-locaux')
            ->setCover('medias-locaux.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-communication'))
            ->setName('Plateformes de Streaming')
            ->setSlug('plateformes-streaming')
            ->setCover('plateformes-streaming.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-communication'))
            ->setName('Réseaux Sociaux')
            ->setSlug('reseaux-sociaux')
            ->setCover('reseaux-sociaux.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-dossiers'))
            ->setName('Fiches Techniques')
            ->setSlug('fiches-techniques')
            ->setCover('fiches-techniques.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-dossiers'))
            ->setName('Plans de Scène')
            ->setSlug('plans-de-scene')
            ->setCover('plans-de-scene.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-contrats'))
            ->setName('Contrats')
            ->setSlug('contrats')
            ->setCover('contrats.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-contrats'))
            ->setName('Assurances')
            ->setSlug('assurances')
            ->setCover('assurances.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-prestations'))
            ->setName('Sonorisation')
            ->setSlug('sonorisation')
            ->setCover('sonorisation.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-prestations'))
            ->setName('Lights & Vidéo')
            ->setSlug('lights-et-video')
            ->setCover('lights-et-video.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-prestations'))
            ->setName('Plateau')
            ->setSlug('plateau')
            ->setCover('plateau.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-regie'))
            ->setName('Régie Générale')
            ->setSlug('regie-generale')
            ->setCover('regie-generale.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-regie'))
            ->setName('Régie Technique')
            ->setSlug('regie-technique')
            ->setCover('regie-technique.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-regie'))
            ->setName('Accueil & Catering')
            ->setSlug('accueil-et-catering')
            ->setCover('accueil-et-catering.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-organisation'))
            ->setName('Concerts & Tournées')
            ->setSlug('concerts-et-tournees')
            ->setCover('concerts-et-tournees.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-organisation'))
            ->setName('Enregistrement Live & Studio')
            ->setSlug('enregistrement-live-et-studio')
            ->setCover('enregistrement-live-et-studio.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-organisation'))
            ->setName('Spectacle Vivant')
            ->setSlug('spectacle-vivant')
            ->setCover('spectacle-vivant.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-formation'))
            ->setName('Ateliers Régie')
            ->setSlug('ateliers-regie')
            ->setCover('ateliers-regie.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-formation'))
            ->setName('Ateliers Techos')
            ->setSlug('ateliers-technique')
            ->setCover('ateliers-technique.webp')
            ->setActive(true);
        $manager->persist($service);

        $service = (new Service())
            ->setCategory($this->getReference('category-formation'))
            ->setName('Ateliers Orga')
            ->setSlug('ateliers-organisation')
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

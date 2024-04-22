<?php

namespace App\AdminBundle\Form\Adherent;

use App\AdherentBundle\Entity\Adherent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdherentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('adherentType', ChoiceType::class, [
                'required' => true,
                'label' => 'Type',
                'choices' => [
                    'Musicien' => 'Musicien',
                    'Groupe' => 'Groupe',
                    'Comédien' => 'Comédien',
                    'Compagnie' => 'Compagnie',
                    "Autre Artiste" => 'Artiste',
                    'Tout ça à la fois' => 'Artiste multi-disciplines',
                    'Carrément autre chose' => 'Autre',
                ],
                'placeholder' => 'Choisissez dans la liste',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('name', TextType::class, [
                'required' => true,
                'label' => 'Nom',
                'attr' => [
                    'class' => 'form-control',
                    'autofocus' => true,
                ],
            ])
            ->add('phone', TextType::class, [
                'required' => false,
                'label' => 'Téléphone',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('email', EmailType::class, [
                'required' => true,
                'label' => 'E-mail',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                'mapped' => false,
                'required' => false,
                'label' => 'Nouveau mot de passe',
                'attr' => [
                    'class' => 'form-control',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adherent::class,
        ]);
    }
}

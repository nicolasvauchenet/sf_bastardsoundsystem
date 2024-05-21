<?php

namespace App\Form\Member;

use App\Entity\Member\Member;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'required' => true,
                'label' => 'Votre e-mail',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                'required' => false,
                'label' => 'Votre mot de passe',
                'mapped' => false,
                'attr' => [
                    'class' => 'form-control',
                ],
                'help' => 'Laissez-le vide pour ne pas le modifier',
            ])
            ->add('gender', ChoiceType::class, [
                'required' => false,
                'label' => 'Votre civilité',
                'choices' => [
                    'Madame' => 'mme',
                    'Monsieur' => 'mr',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('firstname', TextType::class, [
                'required' => false,
                'label' => 'Votre prénom',
                'attr' => [
                    'class' => 'form-control',
                    'autofocus' => true,
                ],
            ])
            ->add('lastname', TextType::class, [
                'required' => false,
                'label' => 'Votre nom',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('pseudo', TextType::class, [
                'required' => false,
                'label' => 'Votre pseudo',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('memberType', ChoiceType::class, [
                'required' => true,
                'label' => 'Vous êtes',
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
            ->add('phone', TextType::class, [
                'required' => false,
                'label' => 'Votre téléphone',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('address1', TextType::class, [
                'required' => false,
                'label' => 'Votre adresse',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('address2', TextType::class, [
                'required' => false,
                'label' => "Complément d'adresse",
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('address3', TextType::class, [
                'required' => false,
                'label' => "Complément d'adresse",
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('zipcode', TextType::class, [
                'required' => false,
                'label' => 'Votre code postal',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('city', TextType::class, [
                'required' => false,
                'label' => 'Votre ville',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('country', TextType::class, [
                'required' => false,
                'label' => 'Votre pays',
                'attr' => [
                    'class' => 'form-control',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Member::class,
        ]);
    }
}

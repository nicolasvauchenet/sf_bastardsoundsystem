<?php

namespace App\Form\BackOffice\Crew\Partner;

use App\Entity\Partner\Partner;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class PartnerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'required' => true,
                'label' => 'E-mail',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])->add('plainPassword', PasswordType::class, [
                'required' => false,
                'label' => 'Mot de passe',
                'mapped' => false,
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
                'help' => 'Laissez-le vide pour ne pas le modifier',
            ])
            ->add('gender', ChoiceType::class, [
                'required' => false,
                'label' => 'Civilité',
                'choices' => [
                    'Madame' => 'mme',
                    'Monsieur' => 'mr',
                ],
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('firstname', TextType::class, [
                'required' => false,
                'label' => 'Prénom',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('lastname', TextType::class, [
                'required' => false,
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('pseudo', TextType::class, [
                'required' => false,
                'label' => 'Pseudo',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('logo', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => 'Logo',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-file',
                ],
                'constraints' => [
                    new File([
                        'maxSize' => '2048k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/webp',
                        ],
                        'mimeTypesMessage' => 'Veuillez choisir une image JPG, PNG ou WebP',
                    ]),
                ],
            ])
            ->add('partnerType', ChoiceType::class, [
                'required' => false,
                'label' => "Type de partenaire",
                'choices' => [
                    'Organisateur' => 'Organisateur',
                    'Programmateur' => 'Programmateur',
                    "Studio d'enregistrement" => 'Studio',
                    'Tout ça à la fois' => 'Partenaire multi-tâches',
                    'Carrément autre chose' => 'Autre',
                ],
                'placeholder' => 'Choisissez dans la liste',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('phone', TextType::class, [
                'required' => false,
                'label' => 'Téléphone',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('address1', TextType::class, [
                'required' => false,
                'label' => 'Adresse',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('address2', TextType::class, [
                'required' => false,
                'label' => "Complément d'adresse",
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('address3', TextType::class, [
                'required' => false,
                'label' => "Complément d'adresse",
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('zipcode', TextType::class, [
                'required' => false,
                'label' => 'Code postal',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('city', TextType::class, [
                'required' => false,
                'label' => 'Ville',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('country', TextType::class, [
                'required' => false,
                'label' => 'Pays',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Partner::class,
        ]);
    }
}

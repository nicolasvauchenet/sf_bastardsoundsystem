<?php

namespace App\AdminBundle\Form\Gestion;

use App\AdminBundle\Entity\Materiel\Category;
use App\AdminBundle\Entity\Materiel\Materiel;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class MaterielType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('category', EntityType::class, [
                'required' => true,
                'label' => 'Catégorie',
                'class' => Category::class,
                'choice_label' => 'name',
                'placeholder' => 'Choisissez dans la liste',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('name', TextType::class, [
                'required' => true,
                'label' => "Nom",
                'attr' => [
                    'class' => 'form-control',
                    'autofocus' => true,
                ],
            ])
            ->add('status', ChoiceType::class, [
                'required' => true,
                'label' => 'État',
                'choices' => [
                    'Ok' => 'Ok',
                    'Hors service' => 'Hors service',
                    'En location' => 'En location',
                ],
                'placeholder' => 'Choisissez dans la liste',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('purchasePrice', TextType::class, [
                'required' => true,
                'label' => "Prix d'achat",
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('argusPrice', TextType::class, [
                'required' => false,
                'label' => "Cote Argus",
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('rentPrice', TextType::class, [
                'required' => false,
                'label' => "Prix de location",
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('invoice', FileType::class, [
                'label' => 'Facture',
                'mapped' => false,
                'required' => false,
                'attr' =>
                    [
                        'class' => 'form-file',
                    ],
                'constraints' => [
                    new File([
                        'maxSize' => '2048k',
                        'mimeTypes' => [
                            'application/pdf',
                            'image/jpeg',
                            'image/png',
                            'image/webp',
                        ],
                        'mimeTypesMessage' => 'Veuillez choisir un PDF ou une image JPG, PNG ou WebP',
                        'maxSizeMessage' => 'Ce fichier est trop volumineux, sa taille ne doit pas dépasser 2Mo',
                    ]),
                ],
            ])
            ->add('createdAt', DateType::class, [
                'required' => true,
                'label' => "Date d'achat",
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Materiel::class,
        ]);
    }
}

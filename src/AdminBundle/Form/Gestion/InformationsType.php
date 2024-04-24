<?php

namespace App\AdminBundle\Form\Gestion;

use App\AppBundle\Entity\Informations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InformationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'required' => true,
                'label' => "Nom du contact de l'association",
                'attr' => [
                    'class' => 'form-control',
                    'autofocus' => true,
                ],
            ])
            ->add('email', EmailType::class, [
                'required' => true,
                'label' => "E-mail de l'association",
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('phone', TextType::class, [
                'required' => false,
                'label' => "Téléphone de l'association",
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('address', TextType::class, [
                'required' => false,
                'label' => "Siège social de l'association",
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('cotisationAmount', TextType::class, [
                'required' => true,
                'label' => 'Montant de la cotisation',
                'attr' => [
                    'class' => 'form-control',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Informations::class,
        ]);
    }
}

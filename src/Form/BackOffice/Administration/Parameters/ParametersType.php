<?php

namespace App\Form\BackOffice\Administration\Parameters;

use App\Entity\BackOffice\Administration\Parameters\Parameters;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParametersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('appName', TextType::class, [
                'required' => true,
                'label' => "Nom de l'association",
                'attr' => [
                    'class' => 'form-control',
                    'autofocus' => true,
                ],
            ])
            ->add('appEmail', EmailType::class, [
                'required' => true,
                'label' => "E-mail de l'association",
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('appPhone', TextType::class, [
                'required' => true,
                'label' => "Téléphone de l'association",
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('appMembershipFee', TextType::class, [
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
            'data_class' => Parameters::class,
        ]);
    }
}

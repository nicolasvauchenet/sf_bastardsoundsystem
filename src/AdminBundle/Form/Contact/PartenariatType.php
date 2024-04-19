<?php

namespace App\AdminBundle\Form\Contact;

use App\FrontOfficeBundle\Entity\Partenariat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartenariatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('partenaireType', ChoiceType::class, [
                'required' => true,
                'label' => 'Type',
                'choices' => [
                    'Organisateur' => 'Organisateur',
                    'Programmateur' => 'Programmateur',
                    "Studio d'enregistrement" => 'Studio',
                    'Tout ça à la fois' => 'Partenaire multi-tâches',
                    'Carrément autre chose' => 'Autre',
                ],
                'placeholder' => 'Choisissez dans la liste',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('partenaireName', TextType::class, [
                'required' => true,
                'label' => 'Nom',
                'attr' => [
                    'class' => 'form-control',
                    'autofocus' => true,
                ],
            ])
            ->add('partenaireEmail', EmailType::class, [
                'required' => true,
                'label' => 'E-mail',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('partenairePhone', TextType::class, [
                'required' => false,
                'label' => 'Téléphone',
                'attr' => [
                    'class' => 'form-control',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Partenariat::class,
        ]);
    }
}

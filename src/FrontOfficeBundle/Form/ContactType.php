<?php

namespace App\FrontOfficeBundle\Form;

use App\FrontOfficeBundle\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('senderType', ChoiceType::class, [
                'required' => true,
                'label' => 'Vous êtes',
                'choices' => [
                    'Musicien ou Groupe' => 'Musicien',
                    'Comédien ou Compagnie' => 'Comédien',
                    'Artiste (autre)' => 'Artiste',
                    'Organisateur' => 'Organisateur',
                    'Programmateur' => 'Programmateur',
                    "Studio d'enregistrement" => 'Studio',
                    'Autre' => 'Autre',
                ],
                'placeholder' => 'Choisissez dans la liste',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('senderName', TextType::class, [
                'required' => true,
                'label' => 'Votre nom',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('senderEmail', EmailType::class, [
                'required' => true,
                'label' => 'Votre e-mail',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('senderPhone', TextType::class, [
                'required' => false,
                'label' => 'Votre téléphone',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('subject', TextType::class, [
                'required' => true,
                'label' => 'Sujet',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('message', TextareaType::class, [
                'required' => true,
                'label' => 'Votre message',
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 7,
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}

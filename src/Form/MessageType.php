<?php

namespace App\Form;

use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('senderType', ChoiceType::class, [
                'required' => true,
                'label' => 'Tu es',
                'choices' => [
                    'Un musicien tout seul' => 'Musicien',
                    'Un groupe de musique' => 'Groupe',
                    "Un autre genre d'artiste" => 'Artiste',
                    'Un organisateur' => 'Organisateur',
                    'Un programmateur' => 'Programmateur',
                    "Un studio d'enregistrement" => 'Studio',
                    'Tout ça à la fois' => 'Multi-tâches',
                    'Carrément autre chose' => 'Autre',
                    'Juste un passant' => 'Visiteur',
                ],
                'placeholder' => 'Trouve-toi dans la liste',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('senderName', TextType::class, [
                'required' => true,
                'label' => 'Ton nom',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('senderEmail', EmailType::class, [
                'required' => true,
                'label' => 'Ton e-mail',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('senderPhone', TextType::class, [
                'required' => false,
                'label' => 'Ton téléphone',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('subject', TextType::class, [
                'required' => true,
                'label' => 'Sujet',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('message', TextareaType::class, [
                'required' => true,
                'label' => 'Ton message',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 8,
                ],
            ])
            ->add('status', ChoiceType::class, [
                'required' => false,
                'label' => 'État du message',
                'choices' => [
                    'Nouveau message' => 'Nouveau',
                    'Message répondu' => 'Répondu',
                ],
                'placeholder' => 'Choisis dans la liste',
                'attr' => [
                    'class' => 'form-control',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}

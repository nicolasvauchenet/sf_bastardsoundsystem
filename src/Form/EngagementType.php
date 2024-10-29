<?php

namespace App\Form;

use App\Entity\Artist;
use App\Entity\Engagement;
use App\Entity\Promoter;
use Karser\Recaptcha3Bundle\Form\Recaptcha3Type;
use Karser\Recaptcha3Bundle\Validator\Constraints\Recaptcha3;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class EngagementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('artist', EntityType::class, [
                'required' => false,
                'class' => Artist::class,
                'choice_label' => 'name',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('promoter', EntityType::class, [
                'required' => false,
                'class' => Promoter::class,
                'choice_label' => 'name',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('name', TextType::class, [
                'required' => true,
                'label' => 'Ton nom',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('organization', TextType::class, [
                'required' => false,
                'label' => 'Le nom de ton lieu',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('email', EmailType::class, [
                'required' => true,
                'label' => 'Ton e-mail',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('phone', TextType::class, [
                'required' => true,
                'label' => 'Ton téléphone',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('placeType', ChoiceType::class, [
                'required' => false,
                'label' => 'Type de lieu',
                'choices' => [
                    'Salle de concerts' => 'Salle de concerts',
                    'Festival - intérieur' => 'Festival - intérieur',
                    'Festival - extérieur' => 'Festival - extérieur',
                    'Bar - intérieur' => 'Bar - intérieur',
                    'Bar - extérieur' => 'Bar - extérieur',
                    'Autre - intérieur' => 'Autre - intérieur',
                    'Autre - extérieur' => 'Autre - extérieur',
                ],
                'placeholder' => 'Choisis dans la liste',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('city', TextType::class, [
                'required' => true,
                'label' => 'Ville',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('budget', NumberType::class, [
                'required' => false,
                'label' => 'Tu as un budget ?',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('message', TextareaType::class, [
                'required' => false,
                'label' => 'Autre chose à ajouter ?',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 4,
                ],
            ])
            ->add('contract', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => 'Contrat de cession',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-file',
                ],
                'constraints' => [
                    new File([
                        'maxSize' => '2M',
                        'mimeTypes' => [
                            'application/pdf',
                        ],
                        'mimeTypesMessage' => 'Veuillez choisir un fichier PDF',
                    ]),
                ],
            ])
            ->add('startAt', null, [
                'required' => false,
                'label' => "C'est prévu quand ?",
                'widget' => 'single_text',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('signedAt', null, [
                'required' => false,
                'label' => 'Ça a été signé quand ?',
                'widget' => 'single_text',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('paidAt', null, [
                'required' => false,
                'label' => 'Ça a été payé quand ?',
                'widget' => 'single_text',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('captcha', Recaptcha3Type::class, [
                'constraints' => new Recaptcha3(),
                'action_name' => 'contact',
                'locale' => 'fr',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Engagement::class,
        ]);
    }
}

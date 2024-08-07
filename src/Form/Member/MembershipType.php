<?php

namespace App\Form\Member;

use App\Entity\Member\Membership;
use Karser\Recaptcha3Bundle\Form\Recaptcha3Type;
use Karser\Recaptcha3Bundle\Validator\Constraints\Recaptcha3;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\IsTrue;

class MembershipType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('memberType', ChoiceType::class, [
                'required' => false,
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
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('memberName', TextType::class, [
                'required' => true,
                'label' => 'Votre nom',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                    'autofocus' => true,
                ],
            ])
            ->add('memberEmail', EmailType::class, [
                'required' => true,
                'label' => 'Votre e-mail',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('memberPhone', TextType::class, [
                'required' => false,
                'label' => 'Votre téléphone',
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
                'label' => 'Votre logo',
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
            ->add('message', TextareaType::class, [
                'required' => false,
                'label' => 'Un truc à nous dire ?',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 7,
                ],
            ])
            ->add('agree', CheckboxType::class, [
                'required' => true,
                'label' => "L'adhésion à Bastard Sound System est soumise au paiement de la cotisation. Je suis ok pour filer les sous afin de devenir adhérent",
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-checkbox',
                ],
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter le montant de la cotisation !',
                    ]),
                ],
            ])
            ->add('captcha', Recaptcha3Type::class, [
                'constraints' => new Recaptcha3(['message' => 'There were problems with your captcha. Please try again or contact with support and provide following code(s): {{ errorCodes }}']),
                'action_name' => 'membership',
                'locale' => 'fr',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Membership::class,
        ]);
    }
}

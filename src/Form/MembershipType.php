<?php

namespace App\Form;

use App\Entity\Membership;
use Karser\Recaptcha3Bundle\Form\Recaptcha3Type;
use Karser\Recaptcha3Bundle\Validator\Constraints\Recaptcha3;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;

class MembershipType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('memberType', ChoiceType::class, [
                'required' => true,
                'label' => 'Tu es',
                'choices' => [
                    'Un musicien tout seul' => 'Musicien',
                    'Un groupe de musique' => 'Groupe',
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
                'required' => false,
                'label' => 'Ton téléphone',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('city', TextType::class, [
                'required' => false,
                'label' => 'Ta ville',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('message', TextareaType::class, [
                'required' => false,
                'label' => 'Ton message',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 11,
                ],
            ])
            ->add('agree', CheckboxType::class, [
                'required' => true,
                'label' => "L'adhésion à BSS est soumise au paiement d'une cotisation de 12€. Je suis ok pour filer les sous avant de devenir adhérent",
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-checkbox',
                ],
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => "Tu n'acceptes pas de payer la cotisation ?",
                    ]),
                ],
            ])
            ->add('status', ChoiceType::class, [
                'required' => false,
                'label' => 'État de la demande',
                'choices' => [
                    'Nouvelle demande' => 'Nouvelle',
                    'Demande acceptée' => 'Acceptée',
                    'Demande refusée' => 'Refusée',
                ],
                'placeholder' => 'Choisis dans la liste',
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
            'data_class' => Membership::class,
        ]);
    }
}

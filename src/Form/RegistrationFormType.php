<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname',TextType::class, ['label' => 'Firstname : ', 'attr' => ['class' => 'form-control my-2']])
            ->add('lastname',TextType::class, ['label' => 'Lastname : ', 'attr' => ['class' => 'form-control my-2']])
            ->add('email', EmailType::class,['label' => 'Email : ', 'attr' => ['class' => 'form-control my-2']])
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Form Access' => 'ROLE_USER',
                    'Dashboard access' => 'ROLE_DASHBOARD',
                ],
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('plainPassword', PasswordType::class, [

                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password', 'class' => 'form-control my-2'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 4,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

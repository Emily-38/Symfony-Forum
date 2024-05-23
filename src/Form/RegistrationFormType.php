<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
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
            ->add('Email', EmailType::class,[
                'attr' =>[
                    'class'=>'bg-white bg-opacity-50 rounded-lg w-full p-2 my-2'
                ],
                'label' => 'Email',
                'label_attr'=>[
                    'class'=>'m-2 text-lg font-bold'
                ], 
            ])
            ->add('pseudo', TextType::class,[
                'attr' =>[
                    'class'=>'bg-white bg-opacity-50 rounded-lg w-full p-2 my-2'
                ],
                'label' => 'Pseudo',
                'label_attr'=>[
                    'class'=>'m-2 text-lg font-bold'
                ]
            ])
            ->add('agreeTerms', CheckboxType::class, [
                                'mapped' => false,
                'attr' =>[
                        'class'=>'m-2 my-2'
                ],
                'label' => 'Agree terms',
                'label_attr'=>[
                    'class'=>'m-2 text-lg font-bold'
                ],                
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type'=> PasswordType::class,
'first_options'=>[
    'attr' => [
        'class'=>'bg-white bg-opacity-50 rounded-lg w-full p-2 my-2',
        'autocomplete' => 'new-password'],
'label'=> 'Mot de passe',
'label_attr'=>[
    'class'=>'m-2 text-lg font-bold'
],
],
'second_options'=>[
    'attr' => [
        'class'=>'bg-white bg-opacity-50 rounded-lg w-full p-2 my-2',
        'autocomplete' => 'new-password'],
       
"label"=>'Confirmer le mots de passe',
'label_attr'=>[
    'class'=>'m-2 text-lg font-bold'
],
],
'invalid_message'=>'les mots de passe ne sont pas identique.',




                                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
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

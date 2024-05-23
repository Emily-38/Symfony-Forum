<?php

namespace App\Form;

use App\Entity\Article;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class,[
                'attr' =>[
                    'class'=>'bg-white bg-opacity-50 rounded-lg w-full p-2 my-2'
                ],
                'label' => 'Title',
                'label_attr'=>[
                    'class'=>'m-2 text-lg font-bold'
                ]
            ] )
            ->add('description', TextareaType::class,[
                'attr' =>[
                    'class'=>'bg-white bg-opacity-50 rounded-lg w-full p-2 my-2'
                ],
                'label' => 'Description',
                'label_attr'=>[
                    'class'=>'m-2 text-lg font-bold'
                ]
            ])
            ->add('img', FileType::class,[
               'required'=> false ,
               'attr' =>[
                'class'=>'py-2 my-2 ',
                
               ],
               'label' => 'Image',
               'label_attr'=>[
                   'class'=>'m-2 text-lg font-bold'
               ]
            ])
            ->add('sumbite', SubmitType::class,[
                'attr' =>[
                'class'=>'bg-black text-white w-full my-2 p-3 rounded-2xl text-2xl'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}

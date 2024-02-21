<?php

namespace App\Form;

use App\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ISBN',TextType::class,[
                'constraints'   => [
                    new NotBlank(),
                    new Length([
                    'min'=> 8,
                    'max'=> 8,
                    'minMessage'=>'L ISBN doit contenir au mininmum {{limit}} caracteres',
                    'maxMessage'=>'L ISBN doit contenir au maximum {{limit}} caractères',
            ]),
            ]
        ])
            ->add('title',TextType::class,[
                'constraints'   => [
                    new NotBlank(),
                    new Length([
                    'min'=> 5,
                    'max'=> 255,
                    'minMessage'=>'Le title doit contenir au mininmum {{limit}} caracteres',
                    'maxMessage'=>'Le title doit contenir au maximum {{limit}} caractères',
            ]),
            ]
        ])
            ->add('resume',TextType::class,[
                'constraints'   => [
                    new NotBlank(),
                    new Length([
                    'min'=> 1,
                    'max'=> 255,
                    'minMessage'=>'Le resume doit contenir au mininmum {{limit}} caracteres',
                    'maxMessage'=>'Le resume doit contenir au maximum {{limit}} caractères',
            ]),
            ]
        ])
            ->add('description',TextType::class,[
                'constraints'   => [
                    new NotBlank(),
                    new Length([
                    'min'=> 1,
                    'max'=> 255,
                    'minMessage'=>'La description doit contenir au mininmum {{limit}} caracteres',
                    'maxMessage'=>'La description doit contenir au maximum {{limit}} caractères',
            ]),
            ]
        ])
            ->add('price',IntegerType::class,[
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('Creer',SubmitType::class,[
                ]); 
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}

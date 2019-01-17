<?php
/**
 * Created by PhpStorm.
 * User: PC6
 * Date: 02/01/2019
 * Time: 14:34
 */

namespace App\Form;

use App\Entity\Article;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre',TextType::class, [
            'required'=>true,
            'label'=>"Titre",
            'attr' => [
                'placeholder'=>"Titre"
            ]
        ])

            ->add('contenu', TextareaType::class, [
                'label' => "Contenu"
            ])

            ->add('featuredImage', FileType::class, [
                'label' => "Image",
                'attr' => [
                    'class' =>'dropify'
                ]
            ])

            ->add('submit', SubmitType::class, [
                'label' => 'Publier mon article'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'date_class' => Article::class
        ]);
    }

    public function getBlockPrefix()
    {
        return 'form';
    }

}
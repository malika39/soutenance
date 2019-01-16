<?php
/**
 * Created by PhpStorm.
 * User: Surface
 * Date: 05/01/2019
 * Time: 22:59
 */

namespace App\Form;



use App\Entity\Ateliersweet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AteliersweetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('description', TextAreaType::class)
            ->add('price', MoneyType::class)
            ->add('imagess', CollectionType::class, [
                'entry_type' => ImageatelierType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ateliersweet::class
        ]);
    }
}
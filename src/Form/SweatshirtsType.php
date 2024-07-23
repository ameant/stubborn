<?php

namespace App\Form;

use App\Entity\Sweatshirts;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class SweatshirtsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => "Nom",
            ])
            ->add('size',  TextType::class, [
                'label' => "Tailles",
            ])
            ->add('price', NumberType::class, [
                'label' => "Prix",
            ])
            ->add('stockXS', NumberType::class, [
                'label' => "Stock XS",
            ])
            ->add('stockS', NumberType::class, [
                'label' => "Stock S",
            ])
            ->add('stockM', NumberType::class, [
                'label' => "Stock M",
            ])
            ->add('stockL', NumberType::class, [
                'label' => "Stock L",
            ])
            ->add('stockXL', NumberType::class, [
                'label' => "Stock XL",
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sweatshirts::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Data\SearchData;
use App\Entity\CarCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;



class SearchForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('q', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Search'
                ]
            ])
            ->add('carCategories', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => CarCategory::class,
                'expanded' => true,
                'multiple' => true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method' => 'GET',
            'crsf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}

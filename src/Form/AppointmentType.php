<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Appointment;
use App\Entity\CarCategory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;





class AppointmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateTimeType::class, [
                'widget' => 'single_text',
            ])
            ->add('content', TextType::class)
            ->add('carCategory', EntityType::class, [
                'label' => 'Catégorie',
                'class' => CarCategory::class,
                'choice_label' => function (CarCategory $category) {
                    return strtoupper($category->getName()); //on affiche en majuscule les categories
                }
            ])
            // ->add('user', EntityType::class, [
            //     'label' => 'User',
            //     'class' => User::class,
            //     'choice_label' => function (User $user) {
            //         return strtoupper($user->getEmail()); //on affiche en majuscule les categories
            //     }
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Appointment::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Appointment;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class Appointment1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date')
            ->add('content')
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'En cours' => 'en_cours',
                    'En attente' => 'en_attente',
                    'Traitée' => 'traitee',
                ],
                'multiple' => false,
                'expanded' => true, // Pour afficher les choix sous forme de cases à cocher
            ])
            ->add('carCategory')
            // ->add('user', TextType::class, [
            //     'disabled' => true,
            //     'data' => $options['user']->getEmail(),
            //     'mapped' => false,
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

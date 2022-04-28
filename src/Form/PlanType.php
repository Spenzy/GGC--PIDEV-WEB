<?php

namespace App\Form;

use App\Entity\Personne;
use App\Entity\Plan;
use App\Entity\Streamer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('date')
            ->add('heure')
            ->add('duree')
            ->add('description')
            ->add('idevenement')
            ->add('idstreamer',EntityType::class,[
                'class'=> Streamer::class,
                'choice_label' => 'idstreamer.nom'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Plan::class,
        ]);
    }
}

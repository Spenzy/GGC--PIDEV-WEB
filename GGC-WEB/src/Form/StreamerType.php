<?php

namespace App\Form;

use App\Entity\Personne;
use App\Entity\Streamer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StreamerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('informations')
            ->add('lienstreaming')
            ->add('idstreamer',EntityType::class,[
                'class'=> Personne::class,
                'choice_label' => 'nom'
            ]

            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Streamer::class,
        ]);
    }
}

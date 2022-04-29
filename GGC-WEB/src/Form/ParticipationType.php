<?php

namespace App\Form;

use App\Entity\Participation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use App\Entity\Evenement;
use App\Entity\Client;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class ParticipationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
         
            ->add('idClient',EntityType::class,[
                'class' => Client::class,
                'choice_label'=>'idClient',
            ])
            ->add('idEvent',EntityType::class,[
                'class' => Evenement::class,
                'choice_label'=>'Titre',
            ])
         
            ->add('Valider',SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Participation::class,
        ]);
    }
}

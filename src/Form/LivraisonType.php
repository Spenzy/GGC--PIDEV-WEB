<?php

namespace App\Form;

use App\Entity\Commande;
use App\Entity\Livraison;
use App\Entity\Livreur;
use App\Repository\CommandeRepository;
use App\Repository\LivraisonRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class LivraisonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('idcommande',EntityType::class,[

                'class'=>Commande::class,
                'query_builder' => function(LivraisonRepository $repoLiv) {
                return $repoLiv->createQueryBuilder('l')
                               ->leftOuterJoin('l.idcommande','c')
                               ->select('c.idcommande')
                               ->where('c.livree = 0');

                }

            ])
            ->add('idlivreur',EntityType::class,[
                'class'=>Livreur::class,
                'choice_label'=>'idlivreur'
            ])
            ->add('dateheure' , DateType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livraison::class,
        ]);
    }
}

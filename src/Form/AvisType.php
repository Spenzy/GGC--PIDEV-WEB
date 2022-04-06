<?php

namespace App\Form;
use App\Entity\Produit;
use App\Entity\Avis;
use App\Entity\Client;
use Doctrine\DBAL\Types\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AvisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('referenceproduit',EntityType::class,[
                'class'=>Produit::class,
                'choice_label'=>'libelle'
            ])
            ->add('type',ChoiceType::class,['choices'=>['excellent'=> 'excellent','moyen'=> 'moyen', 'mediocre'=>'mediocre' ]])
            ->add('description',TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Avis::class,
        ]);
    }
}

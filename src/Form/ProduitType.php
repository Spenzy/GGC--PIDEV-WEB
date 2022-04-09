<?php

namespace App\Form;

use App\Entity\Produit;
use Doctrine\DBAL\Types\FloatType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Length;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('reference',IntegerType::class,[
                'required'=>true,
                'constraints' => array(
                    new \Symfony\Component\Validator\Constraints\NotNull(['message' => 'Ce champ est obligatoire']),
                ),
            ])
            ->add('libelle',TextType::class,[
                'required'=>true,
                'constraints' => array(
                new \Symfony\Component\Validator\Constraints\NotNull(['message' => 'Ce champ est obligatoire']),
            ),
            ])
            ->add('categorie',TextType::class,[
                'required'=>true,
                'constraints' => array(
                    new \Symfony\Component\Validator\Constraints\NotNull(['message' => 'Ce champ est obligatoire']),
                ),
            ])
            ->add('description',TextType::class,[
                'required'=>true,
                'constraints' => array(
                    new \Symfony\Component\Validator\Constraints\NotNull(['message' => 'Ce champ est obligatoire']),
                ),
            ])
            ->add('prix')
            ->add('img',FileType::class,[
                'required'=>true,
                'mapped'=>false,
                'label'=>'veuillez selectionner votre image',
                'constraints' => array(
                        new \Symfony\Component\Validator\Constraints\NotBlank(['message' => 'Veuillez selectionner votre image']),
                ),
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Personne;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Gregwar\CaptchaBundle\Type\CaptchaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Validator\Type\SubmitTypeValidatorExtension;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;




class PersonneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'constraints' => [
                    new Length([
                        'min' => 4,
                        'minMessage' => 'Votre nom d\'utilisateur doit contenir au moins {{ limit }} caractères.',
                    ]),
                   
                ],
            ])
            ->add('prenom', TextType::class, [
                'constraints' => [
                    new Length([
                        'min' => 4,
                        'minMessage' => 'Votre nom d\'utilisateur doit contenir au moins {{ limit }} caractères.',
                    ]),
                ],
            ])
            ->add('datenaissance',DateType::class,[
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',])
            ->add('email',EmailType::class)
            ->add('telephone',TelType::class)
            ->add('password',PasswordType::class)
            ->add('captcha', CaptchaType::class)
            ->add('Save',SubmitType::class)
        
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personne::class,
        ]);
    }
}

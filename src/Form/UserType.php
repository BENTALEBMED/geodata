<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cordial',ChoiceType::class,[
                'choices' => [
                    'Mme' => 'Mme',
                    'Mlle' => 'Mlle',
                    'Mr' => 'Mr',
                ]
            ])
            ->add('nom')
            ->add('prenom')
            ->add('fonction')
            ->add('telephone')
            ->add('email')
            ->add('centre')
            ->add('compte')
            ->add('motPasse',PasswordType::class)
            ->add('role',ChoiceType::class,[
                'choices' => [
                    'Administrateur' => 'Administrateur',
                    'Utilisateur' => 'Utilisateur',                   
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Proveidor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProveidorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('mail')
            ->add('telefon')
            ->add('tipus')
            ->add('actiu')
            ->add('data_alta')
            ->add('data_modificacio')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Proveidor::class,
        ]);
    }
}

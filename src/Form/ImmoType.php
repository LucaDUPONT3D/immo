<?php

namespace App\Form;

use App\Entity\Immo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImmoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('area')
            ->add('habitableRooms')
            ->add('type')
            ->add('adress')
            ->add('swimmingPool')
            ->add('outside')
            ->add('outsideArea')
            ->add('garage')
            ->add('sellType')
            ->add('price')
            ->add('createdDate')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Immo::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Immo;
use Doctrine\DBAL\Types\DecimalType;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImmoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class)
            ->add('picture',TextType::class)
            ->add('area', DecimalType::class)
            ->add('habitableRooms',NumberType::class)
            ->add(
                'type',
                ChoiceType::class,
                ['choices' => ['Maison' => 'Maison', 'Appartement' => 'Appartement', 'Tente' => 'Tente', 'Yourte' => 'Yourte'],
                'expanded' => false,
                    'multiple' => false]
            )
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

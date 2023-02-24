<?php

namespace App\Form;

use App\Entity\Immo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImmoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('picture', TextType::class)
            ->add('area', NumberType::class)
            ->add('habitableRooms')
            ->add(
                'type',
                ChoiceType::class,
                ['choices' =>
                ['Maison' => 'Maison', 'Appartement' => 'Appartement', 'Tente' => 'Tente', 'Yourte' => 'Yourte'],
                'expanded' => false,
                'multiple' => false]
            )
            ->add('adress', TextType::class)
            ->add(
                'swimmingPool',
                ChoiceType::class,
                ['choices' => ['Oui' => true, 'Non'=>false], 'expanded' => false, 'multiple' => false]
            )
            ->add(
                'outside',
                ChoiceType::class,
                ['choices'=>['Oui' => true, 'Non'=>false], 'expanded'=>false, 'multiple'=>false]
            )
            ->add('outsideArea', NumberType::class, ['required'=>false])
            ->add(
                'garage',
                ChoiceType::class,
                ['choices'=>['Oui' => true, 'Non'=>false], 'expanded'=>false, 'multiple'=>false]
            )
            ->add('sellType', ChoiceType::class, ['choices' => ['Vente'=>'Vente', 'Location'=>'Location']])
            ->add('price', MoneyType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Immo::class,
        ]);
    }
}

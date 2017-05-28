<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class WinoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nazwa')
                ->add('kolor', ChoiceType::class, array(
                    'choices' => array(
                        'białe' => 'Białe',
                        'różowe' => 'Różowe',
                        'czerwone' => 'Czerwone',
                    )
                ))
                ->add('smak', ChoiceType::class, array(
                    'choices' => array(
                        'wytrawne' => 'Wytrawne',
                        'półwytrawne' => 'Półwytrawne',
                        'półsłodkie' => 'Półsłodkie',
                        'słodkie' => 'Słodkie',
                    )
                ))
                ->add('rocznik')
                ->add('wyprodukowanaIlosc', null, array('label' => 'Wyprodukowana ilość (litry)'))
                ->add('stan', null, array('label' => 'Dostępna ilość (litry)'))
                ->add('cena', null, array('label' => 'Cena (zł/litr)'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Wino'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_wino';
    }


}

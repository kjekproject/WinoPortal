<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class OpiniaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('tresc', null, array('label' => 'Twoja opinia'))
                ->add('ocena', null, array('label' => 'Twoja ocena'))
                ->add('wino','entity', array(
                    'class' => 'AppBundle:Wino',
                    'choice_label' => 'id',
                    'attr' => array(
                        'class' => 'hidden',
                        'readonly' => true,
                    ),
                    'label' => false,
                    ))
                ->add('user','entity', array(
                    'class' => 'AppBundle:User',
                    'choice_label' => 'id',
                    'attr' => array(
                        'class' => 'hidden',
                        'readonly' => true,
                    ),
                    'label' => false,
                ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Opinia'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_opinia';
    }


}

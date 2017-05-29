<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WiadomoscType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('tytul')
                ->add('tresc')
                ->add('nadawca', null, array(
                    'attr' => array(
                        'class' => 'hidden'
                    ),
                    'label' => false
                ))
                ->add('odbiorca', null, array(
                    'attr' => array(
                        'class' => 'hidden'
                    ),
                    'label' => false
                ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Wiadomosc'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_wiadomosc';
    }


}

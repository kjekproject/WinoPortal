<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseProfileFormType;

class ProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description', 'textarea', 
                ['label' => 'Opis', 'attr' => array('rows' => '3')])
            ->add('address', TextType::class, ['label' => 'Lokalizacja (miasto/region)']);
    }
    public function getParent()
    {
        return BaseProfileFormType::class;
    }
}

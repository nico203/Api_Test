<?php

namespace ApiBundle\Form\Type;
 
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
 
class MascotaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('latitud')
                ->add('longitud')
                ->add('nombre')
                ->add('tamano')
                ->add('situacion')
                ->add('color')
                ->add('comentarios')
                ->add('usuario');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ApiBundle\Entity\Mascota',
            'csrf_protection' => false
        ));
    }
    
    public function getName() {
        return 'mascota';
    }
}

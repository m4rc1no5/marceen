<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 17.10.15
 * Time: 18:21
 */

namespace Marceen\KontaktBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class KontaktType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text')
            ->add('email_from', 'email')
            ->add('phone', 'text')
            ->add('message', 'textarea')
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'kontakt';
    }
}
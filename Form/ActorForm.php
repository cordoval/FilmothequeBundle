<?php
/**
 * Created by JetBrains PhpStorm.
 * User: cordoval
 * Date: 6/9/11
 * Time: 4:22 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Cordova\FilmothequeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ActorForm extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('name');
        $builder->add('title');
        $builder->add('dateOfBirth', 'birthday');
        $builder->add('genre', 'choice', array('choices' => array('F'=>'Female','M'=>'Male')));

    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Cordova\FilmothequeBundle\Entity\Actor',
        );
    }
}
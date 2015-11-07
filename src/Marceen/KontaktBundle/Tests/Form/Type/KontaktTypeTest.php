<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 07.11.15
 * Time: 17:51
 */

namespace Marceen\KontaktBundle\Tests\Form\Type;


use Marceen\KontaktBundle\Form\Type\KontaktType;
use Symfony\Component\Form\Test\TypeTestCase;

class KontaktTypeTest extends TypeTestCase
{
    public function testSubmitValidData()
    {
        $formData = [
            'name' => 'name',
            'email_from' => 'email_from',
            'phone' => 'phone',
            'message' => 'message'
        ];

        //first test
        $type = new KontaktType();
        $form = $this->factory->create($type);

        $form->submit($formData);
        $this->assertTrue($form->isSynchronized());

        $view = $form->createView();
        $children = $view->children;

        foreach(array_keys($formData) as $key){
            $this->assertArrayHasKey($key, $children);
        }
    }
}
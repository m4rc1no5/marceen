<?php

namespace Marceen\KontaktBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class KontaktController extends Controller
{
    /**
     * Formularz konkatowy
     *
     * @return array
     *
     * @Route("/", name="kontakt")
     * @Template()
     */
    public function indexAction()
    {
        return [];
    }
}

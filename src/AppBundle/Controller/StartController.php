<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StartController extends Controller
{
    /**
     * @Route("/", name="start")
     * @Template()
     */
    public function indexAction()
    {
        return [];
    }
}
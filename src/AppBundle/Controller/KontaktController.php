<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 27.09.15
 * Time: 11:35
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class KontaktController extends Controller
{

    /**
     * @Route("/kontakt", name="kontakt")
     * @Template()
     */
    public function indexAction()
    {
        return [];
    }

}
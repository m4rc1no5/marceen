<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 24.10.15
 * Time: 21:20
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ProjektyController
 * @package AppBundle\Controller
 *
 * @Route("/projekty")
 */
class ProjektyController extends Controller
{

    /**
     * @return array
     *
     * @Route("/", name="projekty")
     * @Template()
     */
    public function indexAction()
    {
        return [];
    }
}
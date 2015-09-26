<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 26.09.15
 * Time: 20:23
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class AndroidController
 * @package AppBundle\Controller
 *
 * @Route("/android")
 */
class AndroidController extends Controller
{

    /**
     * @Route("/", name="android")
     */
    public function indexAction()
    {
        return $this->redirect(
            $this->generateUrl('android.calc4runner')
        );
    }

    /**
     * @Route("/calc4runner", name="android.calc4runner")
     * @Template()
     */
    public function calc4runnerAction()
    {
        return [];
    }
}
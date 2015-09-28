<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class StartController
 * @package AppBundle\Controller
 */
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

    /**
     * W poprzedniej wersji strony był link, któtego teraz nie ma - przenosimy zatem
     * dla bezpieczeństwa na stronę startową
     *
     * @Route("/kimjestem/ja_i_strona_ma", name="ja_i_strona_ma")
     */
    public function jaIStronaMaAction()
    {
        return $this->redirectToStart();
    }

    /**
     * W poprzedniej wersji strony był link, któtego teraz nie ma - przenosimy zatem
     * dla bezpieczeństwa na stronę startową
     *
     * @Route("/kimjestem/bieganie", name="bieganie")
     */
    public function bieganieAction()
    {
        return $this->redirectToStart();
    }

    /**
     * @Route("/flickrvlob/{id}", name="flickr")
     */
    public function flickrAction()
    {
        return $this->redirectToStart();
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    private function redirectToStart()
    {
        return $this->redirect(
            $this->generateUrl('start')
        );
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 21.10.15
 * Time: 21:11
 */

namespace AppBundle\Controller;

use Debril\RssAtomBundle\Protocol\FeedReader;
use Debril\RssAtomBundle\Protocol\Parser\FeedContent;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class BlogController
 * @package AppBundle\Controller
 *
 * @Route("/blog", service="app.controller.blog")
 */
class BlogController extends Controller
{

    /** @var FeedReader */
    private $reader;

    /**
     * BlogController constructor.
     * @param FeedReader $reader
     */
    public function __construct(FeedReader $reader)
    {
        $this->reader = $reader;
    }

    /**
     * @return Response
     *
     * @Route("/", name="blog")
     * @Template()
     */
    public function indexAction()
    {
        $date = new \DateTime('2015-01-01');

        $url = "https://m4rc1no5.blogspot.com/feeds/posts/default";

        /** @var FeedContent $feed */
        $feed = $this->reader->getFeedContent($url, $date);

        $items = $feed->getItems();

        return [
            'blog_url' => 'm4rc1no5.blogspot.com',
            'items' => $items
        ];
    }
}
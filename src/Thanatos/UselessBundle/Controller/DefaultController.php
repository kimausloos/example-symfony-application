<?php

namespace Thanatos\UselessBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $tweets = $this->getDoctrine()->getRepository("ThanatosUselessBundle:Tweets")->findAll();
        shuffle($tweets);
        $tweet = array_shift($tweets);

        return array(
            'tweet' => $tweet
        );
    }
}

<?php

namespace Adeti\CaptchaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AdetiCaptchaBundle:Default:index.html.twig', array('name' => $name));
    }
}

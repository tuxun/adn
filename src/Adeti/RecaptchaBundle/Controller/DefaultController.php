<?php

namespace Adeti\RecaptchaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AdetiRecaptchaBundle:Default:index.html.twig', array('name' => $name));
    }
}

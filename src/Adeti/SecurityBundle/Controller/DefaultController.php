<?php

namespace Adeti\SecurityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AdetiSecurityBundle:Default:index.html.twig', array('name' => $name));
    }
}

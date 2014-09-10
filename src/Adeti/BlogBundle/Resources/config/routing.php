<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('adeti_task_homepage', new Route('/hello/{name}', array(
    '_controller' => 'AdetiTaskBundle:Default:index',
)));

return $collection;

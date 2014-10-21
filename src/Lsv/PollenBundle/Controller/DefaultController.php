<?php

namespace Lsv\PollenBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LsvPollenBundle:Default:index.html.twig', array('name' => $name));
    }
}

<?php

namespace Lsv\PollenBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LsvPollenBundle:Default:index.html.twig', array('name' => $name));
    }

    public function getAction(Request $request)
    {
        return new Response(json_encode(array('success' => true, 'data' => 'bla')), 200, array('Content-Type' => 'application/json'));
    }
}

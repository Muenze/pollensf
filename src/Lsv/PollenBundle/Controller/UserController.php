<?php
/**
 * Created by PhpStorm.
 * User: gwehner
 * Date: 25.10.14
 * Time: 20:43
 */

namespace Lsv\PollenBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{

    public function tokenAction(Request $request)
    {
        $provider = $this->get('form.csrf_provider');
        $response = array();
        $response['success'] = true;
        $response['normal'] = $provider->generateCsrfToken('');
        $response['login'] = $provider->generateCsrfToken('authenticate');

        return new Response($this->get('jms_serializer')->serialize($response, 'json'), 200, array('Content-Type' => 'application/json'));
    }

} 
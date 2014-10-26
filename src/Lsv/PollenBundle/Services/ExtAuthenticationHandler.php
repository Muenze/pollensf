<?php
/**
 * Created by PhpStorm.
 * User: guidowehner
 * Date: 17.09.14
 * Time: 12:17
 */

namespace Lsv\PollenBundle\Services;


use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class ExtAuthenticationHandler extends AbstractService
        implements AuthenticationSuccessHandlerInterface, AuthenticationFailureHandlerInterface  {
    /**
     * This is called when an interactive authentication attempt fails. This is
     * called by authentication listeners inheriting from
     * AbstractAuthenticationListener.
     *
     * @param Request $request
     * @param AuthenticationException $exception
     *
     * @return Response The response to return, never null
     */
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception) {
        if($request->isXmlHttpRequest()) {
            $arr = array(
                    'success'   => false,
                    'error'     => $exception->getMessage(),
                    'code'      => $exception->getCode()
            );

            $response = new Response();
            $response->headers->set('Content-Type', 'application/json');

            $json = $this->getContainer()->get('jms_serializer')->serialize($arr, 'json');

            $response->setContent($json);

            return $response;
        } else {
            $response = new RedirectResponse('/login');
            return $response;
        }
    }

    /**
     * This is called when an interactive authentication attempt succeeds. This
     * is called by authentication listeners inheriting from
     * AbstractAuthenticationListener.
     *
     * @param Request $request
     * @param TokenInterface $token
     *
     * @return Response never null
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token) {
        if($request->isXmlHttpRequest()) {
            $arr = array(
                'success'   => true,
                'user'      => $token->getUser()->toExtObject()
            );

            $response = new Response();
            $response->headers->set('Content-Type', 'application/json');

            $json = $this->getContainer()->get('jms_serializer')->serialize($arr, 'json');

            $response->setContent($json);

            return $response;
        } else {
            $response = new RedirectResponse('/');
            return $response;
        }
    }


} 
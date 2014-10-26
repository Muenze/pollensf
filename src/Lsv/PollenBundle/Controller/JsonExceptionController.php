<?php

namespace Lsv\PollenBundle\Controller;


use Symfony\Bundle\TwigBundle\Controller\ExceptionController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\FlattenException;
use Symfony\Component\HttpKernel\Log\DebugLoggerInterface;

/**
 * Class JsonExceptionController
 *
 * Gibt die Json Exceptions aus
 *
 * @package BM\ExtBundle\Controller
 */
class JsonExceptionController extends ExceptionController
{

    /**
     * rendert die Show Action
     *
     * @param Request                   $request
     * @param FlattenException          $exception
     * @param DebugLoggerInterface      $logger
     * @param string                    $_format
     *
     * @return Response
     */
    public function showAction(Request $request, FlattenException $exception, DebugLoggerInterface $logger = null, $_format = 'html')
    {
        $currentContent = $this->getAndCleanOutputBuffering($request->headers->get('X-Php-Ob-Level', -1));

        $code = $exception->getStatusCode();

        return new Response($this->twig->render(
            'LsvPollenBundle:Error:error.json.twig',
            array(
                'status_code' => $code,
                'status_text' => isset(Response::$statusTexts[$code]) ? Response::$statusTexts[$code] : '',
                'full_message' => $exception->getMessage(),
                'exception' => $exception,
                'logger' => $logger,
                'currentContent' => $currentContent,
            )
        ));
    }

}
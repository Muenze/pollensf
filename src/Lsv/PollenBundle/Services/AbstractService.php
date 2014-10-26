<?php
/**
 * Created by PhpStorm.
 * User: guidowehner
 * Date: 14.07.14
 * Time: 13:36
 */

namespace Lsv\PollenBundle\Services;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\DependencyInjection\Container;

/**
 * Class AbstractService
 * The Base Service for DI
 *
 * @package BM\ApiBundle\Services
 */
class AbstractService
{

    /**
     * @var Container
     */
    private $container;

    /**
     * @param Container $container
     */
    public function setContainer($container)
    {
        $this->container = $container;
    }

    /**
     * @return Container
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @return Registry
     */
    public function getDoctrine()
    {
        return $this->getContainer()->get('doctrine');
    }



}
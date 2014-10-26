<?php

namespace Lsv\PollenBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    public function testToken()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/token');
    }

}

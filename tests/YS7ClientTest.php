<?php

namespace Tests;

use Losgif\YS7\Clients\BaseClient;
use Losgif\YS7\Clients\TokenClient;
use Losgif\YS7\YS7Auth;
use Losgif\YS7\YS7Client;
use PHPUnit\Framework\TestCase;

class YS7ClientTest extends TestCase
{
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testGenerateYS7Client(): void
    {
        $appKey = 'ddcb83069d16432e888a8b5f2be16f98';
        $appSecret = '41f79c9bb745b81a3bc3ba9309fdd076';

        $auth = new YS7Auth($appKey, $appSecret);
        $client = new YS7Client($auth);
//        var_dump($client->device()->list(0, 50));
        var_dump($client->device()->camera()->list(0, 50));
//        var_dump($client->device()->info('F51965787'));
//        var_dump($client->device()->info('F74952462'));
        self::assertInstanceOf(YS7Client::class, $client);
    }
}
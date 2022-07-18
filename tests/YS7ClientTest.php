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
        $appKey = '4047cda6ea9245dc9399340cc31cc4d2';
        $appSecret = '13b5a6da59b2034b7532ce94d881a260';
//        ba8e10170c794bd2bd4e69573926acb7
        $auth = new YS7Auth($appKey, $appSecret);
        $client = new YS7Client($auth);
//        var_dump($client->device()->list(0, 50));
        var_dump($client->device()->camera()->list(0, 50));
//        var_dump($client->device()->info('F51965787'));
//        var_dump($client->device()->info('F74952462'));
        var_dump($client->ezopen()->live('D65906394',1,['quality'=>2]));
//        $startTime = date('Y-m-d H:i:s',(time()-30));
//        var_dump($client->ezopen()->rec('F86806776',2,$startTime,null,['quality'=>2]));
        self::assertInstanceOf(YS7Client::class, $client);
    }
}
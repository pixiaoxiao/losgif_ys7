<?php

namespace Tests;

use Losgif\YS7\YS7Auth;
use Losgif\YS7\YS7Client;
use PHPUnit\Framework\TestCase;

class YS7ClientTest extends TestCase {
	/**
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function testGenerateYS7Client(): void{
		$appKey = '5a4c14620faf49d28034e5373b9692f6';
		$appSecret = 'b9dd9dec64dd252a264fe88cbcee71d6';
//        ba8e10170c794bd2bd4e69573926acb7
		$auth = new YS7Auth($appKey, $appSecret);
		$client = new YS7Client($auth);
		// var_dump($client->device()->list(0, 50));
//		        var_dump($client->device()->camera()->list(0, 50));
//		        var_dump($client->device()->camera()->capture('J10050458'));
		//        var_dump($client->device()->info('F51965787'));
		//        var_dump($client->device()->info('F74952462'));
//		var_dump($client->ezopen()->live('J10050458', 1, [
//			'protocol' => 2,
//			'quality' => 2,
//		]));
		        $startTime = date('Y-m-d H:i:s',(time()-300));
		        $endTime = date('Y-m-d H:i:s',(time()));
		        var_dump($client->ezopen()->rec('J10050458',1,$startTime,$endTime,[
                    'type' => 2,
                    'protocol' => 2,
                    'quality' => 2,
                ]));
		//        self::assertInstanceOf(YS7Client::class, $client);
	}
}
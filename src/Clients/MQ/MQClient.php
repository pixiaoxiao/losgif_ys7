<?php
namespace Losgif\YS7\Clients\MQ;

use Losgif\YS7\Clients\BaseClient;
use Losgif\YS7\Traits\RecursiveClientMixin;

/**
 * 消息订阅
 * https://open.ys7.com/doc/zh/book/index/mq_service.html
 *
 * @property ConsumerClient $consumer
 */
class MQClient extends BaseClient
{
    use RecursiveClientMixin;
    protected $clients = [
        'consumer' => ConsumerClient::class
    ];
}

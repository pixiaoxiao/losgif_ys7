<?php

namespace Losgif\YS7\Clients\AI;

use Losgif\YS7\Clients\BaseClient;
use Losgif\YS7\Traits\RecursiveClientMixin;

/**
 * AI智能
 *
 * @property HumanClient $human 人形检测
 */
class AIClient extends BaseClient
{
    use RecursiveClientMixin;
    protected $clients
        = [
            'human' => HumanClient::class
        ];
}

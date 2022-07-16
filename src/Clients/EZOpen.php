<?php

namespace Losgif\YS7\Clients;

use DateTimeZone;

/**
 * EZOPEN协议
 * https://open.ys7.com/doc/zh/readme/ezopen.html
 */
class EZOpen extends BaseClient
{
    public static $defaultOptions = [
        'resolution' => '',  // 清晰度,空标准,hd高清
        'baseUrl' => 'ezopen://open.ys7.com/',
    ];

    const TYPE_LIVE = 1; //预览
    const TYPE_REC = 2; //预览
    /**
     * 获取直播地址
     *
     * @param string $deviceSerial
     * @param int    $channelNo
     * @param array  $options 其他参数 详情请查看萤石文档 https://open.ys7.com/help/82#address-api
     * @return string
     */
    public function live(string $deviceSerial, $channelNo = 1, $options = []): string
    {
        $options['type'] =  self::TYPE_LIVE;
        return $this->getEZUrl($deviceSerial, $channelNo,  $options);
    }

    /**
     * 录制地址
     *
     * @param string $deviceSerial
     * @param int    $channelNo
     * @param null   $start 开始时间时间戳
     * @param null   $end   结束时间时间戳
     * @param array  $options
     *
     * @return string
     */
    public function rec(string $deviceSerial, int $channelNo = 1, $start = null, $end = null, $options = []): string
    {
        if ($start) {
            $options['startTime'] = $start;
        }
        if ($end) {
            $options['stopTime'] = $end;
        }
        $options['type'] =  self::TYPE_REC;
        return $this->getEZUrl($deviceSerial, $channelNo,  $options);
    }

    /**
     * @param string $deviceSerial
     * @param int    $channelNo
     * @param        $type
     * @param array  $options
     *
     * @return string
     */
    private function getEZUrl(string $deviceSerial, int $channelNo, $options = []): string
    {
        $url = $this->getVideoUrl($deviceSerial, $channelNo,$options);
        return $url;
    }
    /**
     * @var liveClient $liveClient
     * */
    protected $liveClient;
    protected  function  setLiveClient(){
        $this->liveClient = new LiveClient($this->auth);
    }

    public function getLiveClient(){
        if(empty($this->liveClient)){
            $this->setLiveClient();
        }
        return $this->liveClient;
    }

    /**
     * @param $deviceSerial
     * @param $channelNo
     * @param $options
     * @return string
     */
    private function getVideoUrl($deviceSerial, $channelNo,$options=[]): string
    {
        $data = $this->getLiveClient()->address($deviceSerial, null, $channelNo,$options);
        return $data['url'];
    }
}

<?php
/*
 * Desc:
 * User: zhiqiang
 * Date: 2021-10-30 14:24
 */

namespace Qmister\think\filesystem;

use League\Flysystem\AdapterInterface;
use Overtrue\Flysystem\Cos\CosAdapter;
use think\filesystem\Driver;

/**
 * Class Cos.
 *
 * @author zhiqiang
 */
class Cos extends Driver
{
    /**
     * @return AdapterInterface
     */
    protected function createAdapter(): AdapterInterface
    {
        $config = [
            'region'          => $this->config['region'],
            'credentials'     => [
                'appId'     => $this->config['appId'], // 域名中数字部分
                'secretId'  => $this->config['secretId'],
                'secretKey' => $this->config['secretKey'],
            ],
            'bucket'          => $this->config['bucket'],
            'timeout'         => $this->config['timeout'] ?? 60,
            'connect_timeout' => $this->config['connect_timeout'] ?? 60,
            'cdn'             => $this->config['cdn'],
            'scheme'          => $this->config['scheme'] ?? 'https',
            'read_from_cdn'   => $this->config['read_from_cdn'] ?? false,
        ];
        return new CosAdapter($config);
    }

    public function addPlugin()
    {
        $this->filesystem->addPlugin(new \Overtrue\Flysystem\Cos\Plugins\FileUrl());
    }
}

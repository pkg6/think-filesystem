<?php

declare(strict_types=1);

namespace think\filesystem\driver;


use League\Flysystem\AdapterInterface;
use think\filesystem\Driver;
use Xxtime\Flysystem\Aliyun\OssAdapter;


class Oss extends Driver
{
    /**
     * @return AdapterInterface
     * @throws \Exception
     *
     */
    protected function createAdapter(): AdapterInterface
    {
        $config = [
            'bucket'   => $this->config['bucket'],
            'endpoint' => $this->config['endpoint'],
        ];
        if (empty($this->config['credentials'])) {
            //使用 函数计算 中的 credentials
            $config['accessId']     = $this->config['accessKeyID'];
            $config['accessSecret'] = $this->config['accessKeySecret'];
            $config['token']        = $this->config['securityToken'];
        } else {
            $config['accessId']     = $this->config['credentials']['accessId'] ?? '';
            $config['accessSecret'] = $this->config['credentials']['accessSecret'] ?? '';
        }

        return new OssAdapter($config);
    }
}

<?php

declare(strict_types=1);

namespace think\filesystem\driver;

use League\Flysystem\FilesystemAdapter;
use think\filesystem\Driver;
use Xxtime\Flysystem\Aliyun\OssAdapter;

class Oss extends Driver
{
    /**
     * @return FilesystemAdapter
     * @throws \Exception
     */
    protected function createAdapter(): FilesystemAdapter
    {
        $config = [
            'bucket'   => $this->config['bucket']，
            'endpoint' => $this->config['endpoint'],
        ];
        if (empty($this->config['credentials'])) {
            $config['accessId']     = $this->config['accessKeyID'];
            $config['accessSecret'] = $this->config['accessKeySecret'];
            $config['token']        = $this->config['securityToken'];
        } else {
            $config['accessId']     = $this->config['credentials']['accessId'] ?? '';
            $config['accessSecret'] = $this->config['credentials']['accessSecret'] ?? '';
        }

        // 注意：确保返回的 OssAdapter 实现了 League\Flysystem\FilesystemAdapter（v2）。
        // 如果 Xxtime\Flysystem\Aliyun\OssAdapter 仍是 v1 适配器，需要替换为 v2 版或使用兼容包装器。
        return new OssAdapter($config);
    }
}

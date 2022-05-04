<?php
namespace think\filesystem\driver;

use League\Flysystem\AdapterInterface;
use think\filesystem\Driver;


class Ftp extends Driver
{
    /**
     * @return AdapterInterface
     */
    protected function createAdapter(): AdapterInterface
    {
        $config = [
            'host'                 => $this->config['host'],
            'username'             => $this->config['username'],
            'password'             => $this->config['password'],
            'port'                 => $this->config['port'] ?? 21,
            'root'                 => $this->config['port'],
            'passive'              => $this->config['passive'] ?? false,
            'ssl'                  => $this->config['ssl'] ?? false,
            'timeout'              => $this->config['timeout'] ?? 5,
            'ignorePassiveAddress' => $this->config['timeout'] ?? false,
        ];

        return new \League\Flysystem\Adapter\Ftp($config);
    }
}

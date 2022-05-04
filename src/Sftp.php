<?php
namespace think\filesystem\driver;


use League\Flysystem\AdapterInterface;
use League\Flysystem\Sftp\SftpAdapter;
use think\filesystem\Driver;


class Sftp extends Driver
{
    /**
     * @return AdapterInterface
     */
    protected function createAdapter(): AdapterInterface
    {
        $config = [
            'host'     => $this->config['host'],
            'port'     => $this->config['port'] ?? 22,
            'username' => $this->config['username'],
            'password' => $this->config['password'],
            'root'     => $this->config['root'] ?? '/home/sftp',
            'timeout'  => $this->config['timeout'] ?? 10,
        ];

        return new SftpAdapter($config);
    }
}

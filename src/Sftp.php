<?php
/*
 * Desc:
 * User: zhiqiang
 * Date: 2021-10-30 16:09
 */

namespace Qmister\think\filesystem;

use League\Flysystem\AdapterInterface;
use League\Flysystem\Sftp\SftpAdapter;
use think\filesystem\Driver;

/**
 * Class Sftp.
 *
 * @author zhiqiang
 */
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

<?php
namespace think\filesystem\driver;

use League\Flysystem\AdapterInterface;
use think\filesystem\Driver;
use whereof\flysystem\github\GithubAdapter;

/**
 * Class Github
 * @author zhiqiang
 * @package Qmister\think\filesystem
 */
class Github extends Driver
{
    /**
     * @return AdapterInterface
     */
    protected function createAdapter(): AdapterInterface
    {
        $token      = $this->config['token'];
        $username   = $this->config['username'];
        $repository = $this->config['repository'];
        $branch     = $this->config['branch'] ?? 'master';
        $hostIndex  = $this->config['hostIndex'] ?? 'fastgit';
        return new GithubAdapter($token, $username, $repository, $branch, $hostIndex);
    }

    public function addPlugin()
    {
        $this->filesystem->addPlugin(new \Qmister\flysystem\github\Plugins\FileUrl());
    }
}
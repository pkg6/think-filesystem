<?php
/*
 * Desc: 
 * User: zhiqiang
 * Date: 2021-11-02 17:45
 */

namespace Qmister\think\filesystem;

use League\Flysystem\AdapterInterface;
use think\filesystem\Driver;
use Qmister\flysystem\github\GithubAdapter;

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
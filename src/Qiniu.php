<?php


namespace think\filesystem\driver;


use League\Flysystem\AdapterInterface;
use Overtrue\Flysystem\Qiniu\QiniuAdapter;
use think\filesystem\Driver;

class Qiniu extends Driver
{
    /**
     * @return AdapterInterface
     */
    protected function createAdapter(): AdapterInterface
    {
        $accessKey = $this->config['accessKey'];
        $secretKey = $this->config['secretKey'];
        $bucket    = $this->config['bucket'];
        $domain    = $this->config['domain'];

        return new QiniuAdapter($accessKey, $secretKey, $bucket, $domain);
    }

    public function addPlugin()
    {
        $this->filesystem->addPlugin(new \Overtrue\Flysystem\Qiniu\Plugins\FetchFile());
        $this->filesystem->addPlugin(new \Overtrue\Flysystem\Qiniu\Plugins\FileUrl());
        $this->filesystem->addPlugin(new \Overtrue\Flysystem\Qiniu\Plugins\PrivateDownloadUrl());
        $this->filesystem->addPlugin(new \Overtrue\Flysystem\Qiniu\Plugins\RefreshFile());
        $this->filesystem->addPlugin(new \Overtrue\Flysystem\Qiniu\Plugins\UploadToken());
    }
}



## 安装

~~~~
composer require tp5er/think-filesystem
~~~~


## 阿里云OSS

> 安装驱动 `composer require xxtime/flysystem-aliyun-oss ^1.5`

~~~
'oss' => [
    'type'         => 'oss',
    'credentials'=>[//若为false,则使用函数计算 runtime context提供的 credentials
        'accessId'     => '******',
        'accessSecret' => '******',
    ],
    'bucket'       => 'bucket',
    'endpoint'     => 'oss-cn-hangzhou.aliyuncs.com',
    'url'          => 'oss.domain.com'
],
~~~

## 腾讯COS

> 安装驱动 `composer require overtrue/flysystem-cos ^2.1`

~~~
'cos' => [
    'type'            => 'cos',
    'region'          => '***', //bucket 所属区域 英文
    'appId'           => '***', // 域名中数字部分
    'secretId'        => '***',
    'secretKey'       => '***',
    'bucket'          => '***',
    'timeout'         => 60,
    'connect_timeout' => 60,
    'cdn'             => '您的 CDN 域名',
    'scheme'          => 'https',
    'read_from_cdn'   => false,
    'domain'       => 'oss.domain.com',//访问域名
],
~~~

## 七牛云

> 安装驱动 ` composer require overtrue/flysystem-qiniu ^1.0`

~~~
'qiniu' => [
    'type'            => 'qiniu' ,
    'accessKey' => '******',
    'secretKey' => '******',
    'bucket'    => 'bucket',
    'domain'       => 'oss.domain.com',//不要斜杠结尾，URL地址域名
],
~~~

## SFTP

> 安装驱动 ` composer require league/flysystem-sftp ^1.0`

~~~
'sftp' => [
    'type'     => 'sftp',
    'host'     => '127.0.0.1',
    'port'     => 22,
    'username' => 'root',
    'password' => '123456',
    'root'     => '/home/sftp',
    'timeout'  => 10,
],
~~~

## FTP

~~~
'ftp' => [
  'type'     => 'ftp',
  'host' => 'ftp.example.com',
  'username' => 'username',
  'password' => 'password',
  'root' => '/path/to/root',
],
~~~

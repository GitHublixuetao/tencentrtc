<?php
//__   ___    _ _   ___     _______  _____ _    _ ______
//\ \ / / |  | | \ | \ \   / /_   _|/ ____| |  | |  ____|
// \ V /| |  | |  \| |\ \_/ /  | | | (___ | |__| | |__
//  > < | |  | | . ` | \   /   | |  \___ \|  __  |  __|
// / . \| |__| | |\  |  | |   _| |_ ____) | |  | | |____
///_/ \_\\____/|_| \_|  |_|  |_____|_____/|_|  |_|______|

// Copyright (c) 2018 寻医社. All rights reserved.
// http://www.xyshe.com.cn
//  Created by Lixuetao
namespace Laurence\Tencentrtc;

use Illuminate\Session\SessionManager;
use Illuminate\Config\Repository;

class Tencentrtc
{
    protected $sdkAppID = '';
    protected $private_key = '';
    protected $public_key = '';

    public function __construct()
    {
        $this->sdkAppID = config('tencentrtc.ilive.sdkAppID');
        $this->private_key = config('tencentrtc.private_key');
        $this->public_key = config('tencentrtc.public_key');
    }

    public function getVerifyUserSig($roomid , $userid)
    {
        try{
            $api = new WebRTCSigApi();

            //设置在腾讯云申请的sdkappid
            $api->setSdkAppid($this->sdkAppID);

            //读取私钥的内容
            //PS:不要把私钥文件暴露到外网直接下载了哦
            $private = file_get_contents($this->private_key);
            //设置私钥(签发usersig需要用到）
            $api->SetPrivateKey($private);

            //读取公钥的内容
            $public = file_get_contents($this->public_key);
            //设置公钥(校验userSig和privateMapKey需要用到，校验只是为了验证，实际业务中不需要校验）
            $api->SetPublicKey($public);


            //生成privateMapKey
            $privateMapKey = $api->genPrivateMapKey($userid, $roomid);

            //生成userSig
            $userSig = $api->genUserSig($userid);

            //校验
            $result = $api->verifyUserSig($userSig, $userid, $init_time, $expire_time, $error_msg);
            $result = $api->verifyPrivateMapKey($privateMapKey, $userid, $init_time, $expire_time, $userbuf, $error_msg);

    //        //打印结果
            $ret =  array(
                'privateMapKey' => $privateMapKey,
                'userSig' => $userSig
            );

            return $ret;
        }catch(Exception $e){
            return $e->getMessage();
        }

    }

}
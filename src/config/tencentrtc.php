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
return [
    /**
     * 需要开通云直播服务
     * 参考指引 @https://cloud.tencent.com/document/product/454/15187#.E4.BA.91.E6.9C.8D.E5.8A.A1.E5.BC.80.E9.80.9A
     * 有介绍APP_BIZID 和 PUSH_SECRET_KEY的获取方法。
     */

    'live' => [

        /**
         * 云直播 APP_ID =  和 APIKEY 主要用于腾讯云直播common cgi请求。appid 用于表示您是哪个客户，APIKey参与了请求签名sign的生成。
         * 后台用他们来校验common cgi调用的合法性
         */

        'app_id' => env('TENCENT_APP_ID', ''),

        /**
         * 云直播 APP_BIZID = 和pushSecretKey 主要用于推流地址的生成，填写错误，会导致推流地址不合法，推流请求被腾讯云直播服务器拒绝
         */

        'app_bizid' => env('TENCENT_APP_BIZID',''),

        /**
         * 云直播 推流防盗链key = 和 APP_BIZID 主要用于推流地址的生成，填写错误，会导致推流地址不合法，推流请求被腾讯云直播服务器拒绝
         */

        'push_secret_key' => env('TENCENT_PUSH_SECRET_KEY',''),

        /**
         * 云直播 API鉴权key = 和appID 主要用于common cgi请求。appid 用于表示您是哪个客户，APIKey参与了请求签名sign的生成。
         * 后台用他们来校验common cgi调用的合法性。
         */

        'apikey' => env('TENCENT_APIKEY',''),

        // 云直播 推流有效期单位秒 默认7天

        'validTime' => '604800', //3600 * 24 * 7
    ],

    /**
     * 需要开通云通信服务
     * 参考指引 @https://cloud.tencent.com/document/product/454/7953#3.-.E4.BA.91.E9.80.9A.E8.AE.AF.E6.9C.8D.E5.8A.A1.EF.BC.88im.EF.BC.89
     * 有介绍appid 和 accType的获取方法。以及私钥文件的下载方法。
     */

    'im' => [

        /**
         * 云通信 IM_SDKAPPID = IM_ACCOUNTTYPE 和 PRIVATEKEY 是云通信独立模式下，为您的独立账号 identifer，
         * 派发访问云通信服务的userSig票据的重要信息，填写错误会导致IM登录失败，IM功能不可用
         */

        'im_sdkappid' => env('IM_SDKAPPID',''),

        /**
         * 云通信 账号集成类型 IM_ACCOUNTTYPE = IM_SDKAPPID 和 PRIVATEKEY 是云通信独立模式下，为您的独立账户identifer，
         * 派发访问云通信服务的userSig票据的重要信息，填写错误会导致IM登录失败，IM功能不可用
         */

        'im_accounttype' => env('IM_ACCOUNTTYPE',''),

        // 云通信 管理员账号

        'administrator' => 'administrator',

        /**
         * 云通信 派发usersig 采用非对称加密算法RSA，用私钥生成签名。PRIVATEKEY就是用于生成签名的私钥，私钥文件可以在互动直播控制台获取
         * 配置privateKey
         * 将private_key文件的内容按下面的方式填写到 PRIVATEKEY。
         */
        'PRIVATEKEY' => '',
        /**
         * 云通信 验证usersig 所用的公钥
         */
        'PUBLICKEY' =>'',
    ],

    /**
     * 需要开通 实时音视频 服务
     * 有介绍appid 和 accType的获取方法。以及私钥文件的下载方法。
     */

    'ilive' => [

        'sdkAppID' => '',

        'accountType' => '',

        /**
         * 派发userSig 和 privateMapKey 采用非对称加密算法RSA，用私钥生成签名。privateKey就是用于生成签名的私钥，私钥文件可以在互动直播控制台获取
         * 配置privateKey
         * 将private_key文件的内容按下面的方式填写到 privateKey字段。
         */
        'privateKey' => '',

    ],

    /**
     * 双人音视频房间相关参数
     */
    'doubleroom' => [

        // 心跳超时 单位秒
        'heartBeatTimeout' => '20',

        // 空闲房间超时 房间创建后一直没有人进入，超过给定时间将会被后台回收，单位秒
        'maxIdleDuration' => '30',
    ],

    /**
     * 直播连麦房间相关参数
     */
    'liveroom' => [

        // 房间容量上限
        'maxMembers' => '4',

        // 心跳超时 单位秒
        'heartBeatTimeout' => '20',

        // 空闲房间超时 房间创建后一直没有人进入，超过给定时间将会被后台回收，单位秒
        'maxIdleDuration' => '30',

        // 最大观众列表长度
        'maxAudiencesLen' => '30',
    ],

    /**
     * 创建者退出的时候是否需要删除房间
     * 默认false。表示房间所有成员是对等的，第一个进房的人退出并不会销毁房间，只有房间没人的时候才会销毁房间。
     * 此配置项只针对双人和多人实时音视频
     */

    'isCreatorDestroyRoom' => false,

    'private_key' => env('PRIVATE_KEY','/blog/public/private_key'),

    'public_key' => env('PUBLIC_KEY','/blog/public/public_key'),

];
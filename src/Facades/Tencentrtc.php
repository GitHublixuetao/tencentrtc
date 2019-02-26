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
namespace Laurence\Tencentrtc\Facades;

use Illuminate\Support\Facades\Facade;

class Tencentrtc extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'tencentrtc';
    }

}
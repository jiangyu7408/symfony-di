<?php

/**
 * Created by PhpStorm.
 * User: Jiang Yu
 * Date: 2018/12/17
 * Time: 15:37.
 */

namespace App;

/**
 * Class Logger2.
 */
class Logger2 implements LoggerInterface
{
    public function __construct()
    {
        var_dump(__CLASS__);
    }
}

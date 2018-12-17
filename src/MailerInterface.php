<?php

/**
 * Created by PhpStorm.
 * User: Jiang Yu
 * Date: 2018/12/17
 * Time: 15:35.
 */

namespace App;

/**
 * Class MailerInterface
 */
interface MailerInterface
{
    /**
     * @param string $msg
     *
     * @return bool
     */
    public function send(string $msg);
}

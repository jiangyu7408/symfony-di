<?php

/**
 * Created by PhpStorm.
 * User: Jiang Yu
 * Date: 2018/12/17
 * Time: 15:38.
 */

namespace App;

/**
 * Class NewsletterManager.
 */
class NewsletterManager
{
    private $mailer;

    /**
     * NewsletterManager constructor.
     *
     * @param MailerInterface $mailer
     */
    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param string $msg
     *
     * @return bool
     */
    public function send(string $msg)
    {
        return $this->mailer->send($msg);
    }
}

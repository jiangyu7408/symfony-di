<?php

/**
 * Created by PhpStorm.
 * User: Jiang Yu
 * Date: 2018/12/17
 * Time: 15:36.
 */

namespace App;

/**
 * Class Mailer.
 */
class Mailer implements MailerInterface
{
    private $transport;
    private $logger;

    /**
     * Mailer constructor.
     *
     * @param string $transport
     */
    public function __construct(string $transport)
    {
        $this->transport = $transport;
    }

    /**
     * @param string $msg
     *
     * @return bool
     */
    public function send(string $msg)
    {
        var_dump([$this->transport, $this->logger, $msg]);

        return true;
    }

    /**
     * @required
     *
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }
}

<?php

namespace Touki\IRC\SocketHandler;

use Touki\IRC\SocketHandler;
use Touki\IRC\Socket;

/**
 * Socket handler
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
class BaseSocketHandler implements SocketHandler
{
    protected $socket;

    /**
     * Constructor
     *
     * @param Socket $socket Socket to write on
     */
    public function __construct(Socket $socket)
    {
        $this->socket = $socket;
    }

    /**
     * {@inheritDoc}
     */
    public function write($message)
    {
        return fwrite($this->socket->getStream(), $message);
    }

    /**
     * {@inheritDoc}
     */
    public function read($length = 1024)
    {
        return fgets($this->socket->getStream(), $length);
    }

    /**
     * {@inheritDoc}
     */
    public function getSocket()
    {
        return $this->socket;
    }
}

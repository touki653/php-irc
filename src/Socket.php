<?php

namespace Touki\IRC;

/**
 * Socket value object for any socket
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
class Socket
{
    /**
     * Stream holder
     * @var resource
     */
    protected $stream;

    /**
     * Constructor
     *
     * @param resource $stream Socket stream
     */
    public function __construct($stream)
    {
        $this->stream = $stream;
    }

    /**
     * Get Stream
     *
     * @return resource Socket Stream
     */
    public function getStream()
    {
        return $this->stream;
    }

    /**
     * Is Equal
     *
     * @param Socket $socket Socket to compare
     *
     * @return boolean
     */
    public function equals(Socket $socket)
    {
        return $this->stream == $socket->getStream();
    }

    /**
     * Is stream
     *
     * @param resource $stream Stream to compare
     *
     * @return boolean
     */
    public function isStream($stream)
    {
        return $this->stream == $stream;
    }
}

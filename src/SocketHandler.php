<?php

namespace Touki\IRC;

/**
 * Base interface for socket handlers
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
interface SocketHandler
{
    /**
     * Gets the main socket getting handled
     *
     * @return Socket
     */
    public function getSocket();

    /**
     * Writes a message
     *
     * @param string $message Message to write
     *
     * @return mixed Write result
     */
    public function write($message);

    /**
     * Reads the socket
     *
     * @param integer $length Max Length to read
     *
     * @return mixed Read result
     */
    public function read($length = 1024);
}

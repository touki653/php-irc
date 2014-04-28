<?php

namespace Touki\IRC\Event;

use Touki\IRC\SocketHandler;

/**
 * Base event for a socket event
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
class SocketEvent extends ApplicationEvent
{
    protected $message;

    /**
     * Get Message
     *
     * @return string Message
     */
    public function getMessage()
    {
        return $this->message;
    }
    
    /**
     * Set Message
     *
     * @param string $message Message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    
        return $this;
    }
}

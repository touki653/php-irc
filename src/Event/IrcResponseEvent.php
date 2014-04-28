<?php

namespace Touki\IRC\Event;

use Touki\IRC\SocketHandler;
use Touki\IRC\IrcResponse;

/**
 * Base event for a response irc
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
class IrcResponseEvent extends ApplicationEvent
{
    protected $response;

    /**
     * Get response
     *
     * @return string response
     */
    public function getResponse()
    {
        return $this->response;
    }
    
    /**
     * Set response
     *
     * @param string $response response
     */
    public function setResponse(IrcResponse $response)
    {
        $this->response = $response;
    
        return $this;
    }
}

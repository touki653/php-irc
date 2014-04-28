<?php

namespace Touki\IRC\EventListener;

use Touki\IRC\EventDispatcher;
use Touki\IRC\Event\IrcResponseEvent;
use Touki\IRC\Request\PongRequest;

/**
 * Ping listener answers to PING request
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
class PingListener
{
    /**
     * On IRC Message
     *
     * @param IrcResponseEvent $event      Event
     * @param EventDispatcher  $dispatcher Dispatcher
     */
    public function onIrcResponse(IrcResponseEvent $event, EventDispatcher $dispatcher)
    {
        $response = $event->getResponse();

        if ('PING' !== $response->getType()) {
            return;
        }

        $event->stopPropagation();

        $event->getRequester()->send(new PongRequest($response->getContent()));
    }
}

<?php

namespace Touki\IRC\EventListener;

use Touki\IRC\ResponseFactory;
use Touki\IRC\IrcResponse;
use Touki\IRC\MessageResponse;
use Touki\IRC\EventDispatcher;
use Touki\IRC\Event\SocketReadEvent;
use Touki\IRC\Event\IrcResponseEvent;
use Touki\IRC\Event\MessageResponseEvent;

/**
 * Listens to socket response
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
class SocketListener
{
    protected $factory;

    /**
     * Constructor
     *
     * @param ResponseFactory $factory Factory
     */
    public function __construct(ResponseFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * On socket read
     *
     * @param SocketReadEvent $event      Event
     * @param EventDispatcher $dispatcher Dispatcher
     */
    public function onSocketRead(SocketReadEvent $event, EventDispatcher $dispatcher)
    {
        try {
            $response = $this->factory->build($event->getMessage());
        } catch (\UnexpectedValueException $e) {
            printf("%s%s", $e->getMessage(), PHP_EOL);

            return;
        }

        if ($response instanceof IrcResponse) {
            $event = new IrcResponseEvent($event->getApplication(), $event->getRequester());
            $event->setResponse($response);

            $dispatcher->dispatch('response.irc', $event);
        }

        if ($response instanceof MessageResponse) {
            $event = new MessageResponseEvent($event->getApplication(), $event->getRequester());
            $event->setResponse($response);

            $dispatcher->dispatch('response.message', $event);
        }
    }
}

<?php

namespace Touki\IRC;

use Touki\IRC\Event\SocketReadEvent;
use Touki\IRC\Event\ApplicationEvent;
use Touki\IRC\Request\RawRequest;
use Touki\IRC\SocketHandler\BaseSocketHandler;

/**
 * Main class for an application
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
class Application
{
    protected $dispatcher;

    /**
     * Constructor
     *
     * @param EventDispatcher $dispatcher Event Dispatcher
     */
    public function __construct(EventDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * Adds an event listener
     *
     * @param string   $event  Event name
     * @param callable $action Action
     */
    public function on($event, $action)
    {
        $this->dispatcher->addListener($event, $action);
    }

    /**
     * Starts the application
     *
     * @param string  $host Host
     * @param integer $port Port
     */
    public function run($host, $port)
    {
        $client = fsockopen($host, $port);
        stream_set_blocking($client, 0);

        $socket    = new Socket($client);
        $handler   = new BaseSocketHandler($socket);
        $requester = new Requester($handler);

        $open = fopen('php://stdin', 'r');
        stream_set_blocking($open, 0);
        $input = new BaseSocketHandler(new Socket($open));

        $this->dispatcher->dispatch('app.start', new ApplicationEvent($this, $requester));

        while (true) {
            if (false !== $message = $handler->read()) {
                $event = new SocketReadEvent($this, $requester);
                $event->setMessage($message);

                $this->dispatcher->dispatch('socket.read', $event);
            }

            if (false !== $message = $input->read()) {
                $requester->send(new RawRequest($message));
            }
        }
    }
}

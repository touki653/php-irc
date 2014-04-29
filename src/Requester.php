<?php

namespace Touki\IRC;

class Requester
{
    protected $handler;

    /**
     * Constructor
     *
     * @param SocketHandler $handler Socket handler
     */
    public function __construct(SocketHandler $handler)
    {
        $this->handler = $handler;
    }

    /**
     * Sends a request
     *
     * @param Request $request Request
     *
     * @return mixed
     */
    public function send(Request $request)
    {
        $content = rtrim($request->getRequest());

        // Ewww but temporary
        echo sprintf(">>> %s%s", $content, PHP_EOL);

        return $this->handler->write(sprintf("%s\r\n", $content));
    }
}

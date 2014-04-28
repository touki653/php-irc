<?php

namespace Touki\IRC\Request;

class PongRequest extends TypedRequest
{
    protected $pong;

    /**
     * Constructor
     *
     * @param string $pong PING content
     */
    public function __construct($pong)
    {
        $this->pong = $pong;
    }

    /**
     * {@inheritDoc}
     */
    public function getType()
    {
        return 'PONG';
    }

    /**
     * {@inheritDoc}
     */
    public function getContent()
    {
        return sprintf(" :%s", $this->pong);
    }
}

<?php

namespace Touki\IRC\Request;

/**
 * Pong request
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
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

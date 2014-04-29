<?php

namespace Touki\IRC\Request;

/**
 * Pong request
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
class PongRequest extends TypedRequest
{
    /**
     * Constructor
     *
     * @param string $ping PING content
     */
    public function __construct($ping)
    {
        parent::__construct('PONG', sprintf(" :%s", $ping));
    }
}

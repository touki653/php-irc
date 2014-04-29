<?php

namespace Touki\IRC\Request;

/**
 * Quit request
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
class QuitRequest extends TypedRequest
{
    /**
     * Constructor
     *
     * @param string $message Quit message
     */
    public function __construct($message = null)
    {
        parent::__construct('QUIT', $message);
    }
}

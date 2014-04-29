<?php

namespace Touki\IRC\Request;

/**
 * Quit request
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
class QuitRequest extends TypedRequest
{
    protected $message;

    /**
     * Constructor
     *
     * @param string $message Quit message
     */
    public function __construct($message = null)
    {
        $this->message = $message;
    }

    /**
     * {@inheritDoc}
     */
    public function getType()
    {
        return 'QUIT';
    }

    /**
     * {@inheritDoc}
     */
    public function getContent()
    {
        return $this->message;
    }
}

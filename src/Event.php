<?php

namespace Touki\IRC;

/**
 * Base class for any event
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
class Event
{
    protected $stoppedPropagation = false;

    /**
     * Stops event propaggation
     */
    public function stopPropagation()
    {
        $this->stoppedPropagation = true;
    }

    /**
     * Is propagation stopped
     *
     * @return boolean
     */
    public function isPropagationStopped()
    {
        return $this->stoppedPropagation;
    }
}
